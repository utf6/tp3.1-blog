<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * RBAC权限控制器
 */
Class RbacController extends CommonController {

	//用户列表
	Public function index() {
		$this->user = D('UserRelation')->relation(true)->field('password', true)->select();
		$this->display();
	}
	//角色列表
	Public function role() {
		$this->role = M('role')->select();
		$this->display();

	}
	//节点列表
	Public function node() {
		//列出所有节点
		$node = M('node')->where(array('status' => 1))->order('sort')->field(array('pid,id,title,name,level'))->select();
		$this->node = node_merge($node);
		$this->display();
	}
	//添加用户
	Public function addUser() {
		//读取所有角色
		$this->role = M('role')->where(array('status' => 1))->select();
		$this->display();
	}

	//添加用户表单处理
	Public function doAddUser() {
		if(!IS_POST){
			E('页面不存在');
		}
		$password = md5(I('password'));			

		//提取post数据
		$data = array(
			'username' => I('username'),
			'password' => $password
			);
		//添加用户
		if ($uid = M('wish_user')->add($data)) {
			//组合用户拥有角色数据
			$role = array();
			foreach ($_POST['role'] as $v) {
				$role[] = array(
					'role_id' => $v,
					'user_id' => $uid
					);
			}
			//插入用户拥有角色数据
			M('role_user')->addAll($role);
			$this->success('添加成功', U('Rbac/index'));			
		} else {
			$this->error('添加失败');
		}
	}

	//删除用户操作
	Public function delUser() {
		$id = I('id');
		//删除用户信息
		if (M('wish_user')->where(array('id' => $id))->delete()) {
			//删除用户拥有角色
			M('role_user')->where(array('user_id' => $id))->delete();
			$this->success('删除成功', U('Rbac/index'));
		} else {
			$this->error('删除失败');
		}
	}

	//锁定/解锁 用户处理
	Public function lockUser() {
		$id = I('id');
		if (!$id) {
			E('页面不存在');
		}
		// 解/锁  0：解锁，1：锁定
		$lock = I('lock');
		$type = $lock ? '锁定' : '解锁';

		$data = array(
			'id' => $id,
			'lock' => $lock
			);
		//修改lock值为1锁定该用户
		if (M('wish_user')->save($data)) {
			$this->success($type . '成功', U('Rbac/index'));
		} else {
			$this->error($type . '失败');
		}
	}

	//重置用户密码操作
	Public function reset() {
		$data = array(
			'id' => I('id'),
			'password' => md5(123456)
			);
		//修改lock值为0解锁该用户
		if (M('wish_user')->save($data)) {
			$this->success('重置成功', U('Rbac/index'));
		} else {
			$this->error('重置失败');
		}
	}
	//添加角色
	Public function addRole() {
		$this->display();
	}
	//添加角色表单处理
	Public function doAddRole() {
		if (!IS_POST) {
			E('页面不存在');
		}
		if (M('role')->add($_POST)) {
			$this->success('添加成功', U('role'));
		} else {
			$this->error('添加失败');
		}
	}
	//添加节点
	Public function addNode() {	
		$this->pid = I('pid', 0, 'intval');
		$this->level = I('level', 1, 'intval');
		switch ($this->level) {
			case 1:
				$this->type = '应用';
				break;
			case 2:
				$this->type = '控制器';
				break;
			case 3:
				$this->type = '方法';
				break;
		}
		$this->display();
	}

	//添加节点表单处理
	Public function doAddNode() {
		if (!IS_POST) {
			E('页面不存在');
		}
		if (M('node')->add($_POST)) {
			$this->success('添加成功', U('node'));
		} else {
			$this->error('添加失败');
		}
	}

	//禁用/启用 角色操作
	Public function ableRole(){
		$id = I('id');
		if (!$id) {
			E('页面不存在');
		}
		//是否启用 0：禁用，1：启用
		$status = I('status');
		$type = $status ? '启用' : '禁用';
		$data = array(
			'id' => $id,
			'status' => $status
			);
		if (M('role')->save($data)) {
			$this->success($type.'成功', U('Rbac/role'));
		} else {
			$this->error($type . '失败');
		}
	}
	//修改节点视图
	Public function editNode() {
		$this->node = M('node')->where(array('id' => I('id')))->find();
		$this->level = I('level', 1, 'intval');
		switch ($this->level) {
			case 1:
				$this->type = '应用';
				break;
			case 2:
				$this->type = '控制器';
				break;
			case 3:
				$this->type = '方法';
				break;
		}
		$this->display();
	}

	//修改节点表单处理
	Public function doEditNode() {
		if (!IS_POST) {
			E('页面不存在');
		}
		//更新节点数据
		if (M('node')->save($_POST)) {
			$this->success('修改成功', U('Rbac/node'));
		} else {
			$this->error('修改失败');
		}
	}

	//删除节点处理
	Public function delNode() {
		if (M('node')->where(array('id' => I('id')))->delete()) {
			$this->success('删除成功', U('Rbac/node'));
		} else {
			$this->error('删除失败');
		}
	}

	//配置权限视图
	Public function access() {
		//要配置的权限的角色ID
		$id = I('rid');
		//读取所有节点
		$node = M('node')->order('sort DESC')->select();
		//角色拥有的节点
		$access = M('access')->where(array('role_id' => $id))->getField('node_id', true);

		$this ->rid = $id;
		$this->node = node_merge($node, $access);
		$this->display();
	}
	//配置新权限处理
	Public function setAccess() {
		$rid = I('rid');  //要配置权限的角色的ID
		if (!$rid) {
			E('页面不存在');
		}
		$db = M('access'); //实例化数据模型
		
		//先删除掉老的权限
		$db->where(array('role_id' => $rid))->delete();

		//组合新的权限
		$data = array();
		foreach ($_POST['access'] as $v) {
			$data[] = array(
				'role_id' => $rid,
				'node_id' => $v
				);
		}
		//插入新的权限
		if ($db->addAll($data)) {
			$this->success('配置成功', U('Rbac/role'));
		} else {
			$this->error('配置失败');
		}
	}
}
?>