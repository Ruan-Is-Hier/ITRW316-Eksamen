<?php

	class RequestData {
		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT number_process, arrival_time FROM queues");
			$query->execute();
			return $query->fetchAll();
		}
	}

?>