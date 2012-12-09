<?php
	
	//Friend utilities
	function addFriend($user, $friend) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("INSERT INTO user_friends(user_id, friend_id) VALUES ($user, $friend);");
		$db->close();
	}

	
	function alreadyFriends($user, $friend) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM user_friends WHERE  user_friends.user_id = {$user} AND user_friends.friend_id = {$friend};");
		$count = mysqli_num_rows($result);
		if ($count != 0) {
			$db->close();
			return true;
		}
		else {
			$db->close();
			return false;	
		}
	}

	function deleteFriend($user, $friend) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("DELETE FROM user_friends WHERE user_friends.user_id = {$user} AND user_friends.friend_id = {$friend};");
		$db->close();
	}

	function retrieveFriends($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM user_friends LEFT JOIN users on (user_friends.user_id = {$user}) WHERE friend_id = id;");
		$count = mysqli_num_rows($result);
		$friends_list = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($friends_list, $row);
		}
		$db->close();
		return $friends_list;	
	}

	//Member utilities
	function retrieveMembers($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM users WHERE id != $user");
		$count = mysqli_num_rows($result);
		$members_list = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($members_list, $row);
		}
		$db->close();
		return $members_list;
	}

	//Status utilities
	function addStatus($user, $status) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("INSERT INTO user_statuses(user_id, status, post_date) VALUES ($user, \"$status\", NOW());");
		$db->close();	
	}

	function retrieveUserStatuses($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM user_statuses WHERE  user_statuses.user_id = {$user} ORDER BY post_date DESC LIMIT 5;");
		$count = mysqli_num_rows($result);
		$statuses = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($statuses, $row);
		}
		$db->close();
		return $statuses;
	}

	function retrieveUserAndFriendStatuses($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);

		//$query = "SELECT users.id, user_"
		//$result = $db->query($query);

		//SELECT * FROM user_friends LEFT JOIN users on (user_friends.user_id = {$user}) WHERE friend_id = id
		
		//not finished yet - shows all users
		$result = $db->query("SELECT * FROM user_statuses ORDER BY post_date LIMIT 20");
		$count = mysqli_num_rows($result);
		$statuses = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($statuses, $row);
		}
		$db->close();
		return $statuses;
	}

	

	//Profile utility
	function getUserInformation($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT username, first_name, last_name, profile_pic, gender, age, other  FROM users WHERE  id = {$user};");
		$user_info = array();
		array_push($user_info, $result->fetch_array(MYSQLI_ASSOC));
		return $user_info;
	}

?>
