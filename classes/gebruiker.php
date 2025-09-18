<?php


class user
{

    public int $userId;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $username;
    public string $password;
    public string $role;

    public static function allUsers ($username, $password)
    {
        $conn = Database::start();

        $query = "SELECT * FROM users WHERE user_username = '" . $username . "' AND user_password = '" . $password . "'";

        $result = $conn->query($query);

        $user = null;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User ();
                $user->userId = $row['user_id'];
                $user->firstname = $row['user_firstname'];
                $user->lastname = $row['user_lastname'];
                $user->email = $row['user_email'];
                $user->username = $row['user_username'];
                $user->password = $row['user_password'];
                $user->role = $row['user_role'];
            }
        }
        $conn->close();
        return $user;
    }

}
?>