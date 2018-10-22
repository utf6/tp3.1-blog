<?php
//000000000003s:1598:"<?php $field = array("id","face","username","answer","ask","adopt","point","exp");$_user_info = M("user")->field($field)->find($_SESSION["uid"]);extract($_user_info);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "__PUBLIC__/Images/noface.gif" : "__ROOT__/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='userinfo'>
				<dl>
					<dt>
						<a href="{$url}"><img src="{$face}" width='48' height='48' alt="{$username}"/></a>
					</dt>
					<dd class='username'>
						<a href="{$url}"><b>{$username}</b></a>
						<a href="">
							<i class='level lv{$level}' title='lv{$level}'></i>
						</a>
					</dd>
					<dd>金币：<a href="" style="color: #888888;">{$point}<b class='point'></b></a></dd>
					<dd>经验值：{$exp}</dd>
				</dl>
				<table>
					<tr>
						<td>回答数</td>
						<td>采纳率</td>
						<td class='last'>提问数</td>
					</tr>
					<tr>
						<td><a target='_blank' href="{:U('Member/answer', array('id' => $id, 'from' => 'answer'))}">{$answer}</a></td>
						<td><a target='_blank' href="{:U('Member/answer', array('id' => $id, 'from' => 'answer', 'type' => 1))}">{$adopt}</a></td>
						<td class='last'><a target='_blank' href="{:U('Member/ask', array('id' => $id, 'from' => 'ask'))}">{$ask}</a></td>
					</tr>
				</table>
				<ul>
					<li><a target='_blank' href="{:U('Member/ask', array('id' => $id, 'from' => 'ask'))}">我提问的</a></li>
					<li><a target='_blank' href="{:U('Member/answer', array('id' => $id, 'from' => 'answer'))}">我回答的</a></li>
				</ul>
			</div>";
?>