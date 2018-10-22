<?php
//000000000003s:1068:"<?php $field = array("id","face","username","answer","ask","adopt","point","exp");$_user_info = M("user")->field($field)->find($_GET['id']);extract($_user_info);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "__PUBLIC__/Images/noface.gif" : "__ROOT__/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='userinfo'>
			<dl>
				<dt>
					<a href="{$url}"><img src="{$face}" width='48' height='48' alt="{$username}"/></a>
				</dt>
				<dd class='username'>
					<a href="{$url}"><b>{$username}</b></a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class='point'>{$point}</b></a></dd>
				<dd>经验值：{$exp}</dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href="">{$answer}</a></td>
					<td><a href="">{$adopt}</a></td>
					<td class='last'><a href="">{$ask}</a></td>
				</tr>
			</table>
		</div>";
?>