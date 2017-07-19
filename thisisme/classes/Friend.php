<?php
	/**
	* 
	*/
	class Friend
	{
		public function __construct()	
		{

		}

		public function AddFriend($db,$userId,$memberId)
		{
			$db->query( "INSERT INTO friends ( members_id, status, sendedToId) 
                VALUES ( :members_id, :status, :sendedToId)",  
                array(
                ':members_id' => $userId,
                ':status' => 'pending',
                ':sendedToId' => $memberId
            ));	
		}

		public function RemoveFriend($db,$userId,$memberId)
		{
			$db->query( "DELETE FROM friends 
                WHERE members_id = :members_id AND sendedToId = :sendedToId",  
                array(
                ':members_id' => $userId,
                ':sendedToId' => $memberId,
            ));
		}

		public function DeleteFriend($db,$userId,$memberId)
		{
			$db->query( "DELETE FROM friends 
                WHERE status = :status 
                AND (sendedToId = :members_id OR members_id = :members_id)
                AND (sendedToId = :sendedToId OR members_id = :sendedToId)",  
                array(
                ':status' => 'accept',
                ':members_id' => $userId,
                ':sendedToId' => $memberId
            ));
		}

		public function RemoveRequest($db,$userId,$memberId)
		{
			$db->query( "DELETE FROM friends 
                WHERE members_id = :members_id AND sendedToId = :sendedToId AND status = :status",  
                array(
                ':members_id' => $memberId,
                ':sendedToId' => $userId,
                ':status' => 'pending'
            ));
		}

		public function AcceptFriend($db,$userId,$memberId)
		{	
			$db->query( "UPDATE friends
				SET status = :newstatus 
                WHERE members_id = :members_id AND sendedToId = :sendedToId AND status = :status",  
                array(
                ':members_id' => $memberId,
                ':status' => 'pending',
                ':sendedToId' => $userId,
                ':newstatus' => 'accept'
            ));	
		}

		public function CheckNewFriends($db,$userId)
		{
			$Requests = $db->query( "SELECT * FROM friends
                WHERE status = :status AND sendedToId = :sendedToId",  
                array(
                ':status' => 'pending',
                ':sendedToId' => $userId
            ));

            return $Requests;	
		}

		public function getFriendRequestData($db,$memberId)
		{
			$memberData = $db->query( "SELECT * FROM members
                WHERE id = :id",  
                array(
                ':id' => $memberId
            ));

            return $memberData;	
		}

		public function showFriends($db,$userId)
		{
			$Requests = $db->query( "SELECT * FROM friends
                WHERE status = :status AND (sendedToId = :sendedToId OR members_id = :members_id)",  
                array(
                ':status' => 'accept',
                ':sendedToId' => $userId,
                ':members_id' => $userId
            ));

            return $Requests;	
		}

		public function CheckFriendsStatus($db,$userId,$memberId)
		{
			$Requests = $db->query( "SELECT status FROM friends
                WHERE (sendedToId = :sendedToId OR members_id = :sendedToId) AND (sendedToId = :members_id OR members_id = :members_id)",  
                array(
                ':sendedToId' => $userId,
                ':members_id' => $memberId
            ));

            return $Requests;	
		}

		public function CheckifUserSended($db,$userId,$memberId)
		{
			$Requests = $db->query( "SELECT status FROM friends
                WHERE members_id = :members_id AND sendedToId = :sendedToId",  
                array(
                ':sendedToId' => $memberId,
                ':members_id' => $userId
            ));

            return $Requests;	
		}

	}
?>