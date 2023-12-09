<?php

class UpdateController {
    private $updateModel;

    public function __construct() {
        $this->updateModel = new UpdateModel();
    }

    public function showUpdateForm() {
        include('app/views/update/form.php');
    }

    public function submitUpdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $updateContent = $_POST['update_content'];
            if (empty($updateContent)) {
                echo "Update content is required.";
                return;
            }

            $this->updateModel->submitUpdate($userId, $updateContent);

            echo "Your update has been submitted!";
        } else {
            echo "Invalid request method.";
        }
    }
}

?>
