<?php

class SearchController {
    private $searchModel;

    public function __construct() {
        $this->searchModel = new SearchModel();
    }

    public function performSearch() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
            $searchQuery = $_GET['query'];
            $searchResults = $this->searchModel->search($searchQuery);
            include('app/views/search/results.php');
        } else {
            include('app/views/search/form.php');
        }
    }
}

?>
