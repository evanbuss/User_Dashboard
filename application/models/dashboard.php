<?


Class Dashboard extends CI_Model {

	public function create_user($data) {
		$query = "SELECT id FROM users";
		$result = $this->db->query($query)->num_rows();
		if($result == 0) {
			$query = "INSERT INTO users (email, first_name, last_name, description, password, permission, created_at) VALUES (?,?,?,?,?,9,NOW())";
			$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['description']}", "{$data['password']}");
			return $this->db->query($query, $values);
		} else {
			$query = "SELECT * FROM users WHERE email='{$data['email']}'";
			$result = $this->db->query($query)->num_rows();
			if($result >= 1) {
				$this->session->set_flashdata('reg_errors', "User Email Already Exists");
				redirect('/register');
			} else {
				$query = "INSERT INTO users (email, first_name, last_name, description, password, permission, created_at) VALUES (?,?,?,?,?,1,NOW())";
				$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['description']}", "{$data['password']}");
				return $this->db->query($query, $values);
			}
		}
	}

	public function get_user_by_email($email) {
		$query = "SELECT * FROM users WHERE email='{$email}'";
		return $this->db->query($query)->result_array();
	}

	public function get_user_by_id($id) {
		$query = "SELECT *, NULL AS password FROM users WHERE id='{$id}'";
		return $this->db->query($query)->row_array();
	}

	public function get_all() {
		$query = "SELECT *, NULL AS password FROM users";
		return $this->db->query($query)->result_array();
	}

	public function edit_user($data) {
		$query = "UPDATE users SET email='{$data['email']}', first_name='{$data['first_name']}', last_name='{$data['last_name']}', description='{$data['description']}', permission='{$data['permission']}'
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function edit_user_password($data) {
		$query = "UPDATE users SET password = '{$data['password']}'
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function destroy_user($id) {
		$query = "DELETE FROM users WHERE id = {$id}";
		return $this->db->query($query);
	}
	// Messages and Comments
	public function create_message($data){
		if($data != '') {
			$query = "INSERT INTO messages (message, created_at, updated_at, user_id, author) VALUES (?,NOW(),NOW(),?,?)";
			$values = array("{$data['message']}", "{$data['user_id']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}" );
			return $this->db->query($query, $values);
		}
	}
	public function get_messages() {
         return $this->db->query("SELECT * FROM messages")->result_array();
	}
	public function create_comment($data){
		if($data != '') {
			$query = "INSERT INTO comments (comment, created_at, updated_at, author, messages_id, users_id) VALUES (?,NOW(),NOW(),?,?,?)";
			$values = array("{$data['comment']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}", "{$data['messages_id']}", "{$data['user_id']}");
			return $this->db->query($query, $values);
		}
	}
	public function get_comments() {
         return $this->db->query("SELECT * FROM comments")->result_array();
	}
	public function create_private_message($data){
		if($data != '') {
			$query = "INSERT INTO private_messages (message, created_at, updated_at, user_id, author) VALUES (?,NOW(),NOW(),?,?)";
			$values = array("{$data['message']}", "{$data['user_id']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}" );
			return $this->db->query($query, $values);
		}
	}
	public function get_private_messages() {
         return $this->db->query("SELECT * FROM private_messages")->result_array();
	}

}








