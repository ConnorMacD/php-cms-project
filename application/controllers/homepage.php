<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 6:09 PM
 */

class Homepage extends CI_Controller {

    /**
     * Add specific page loading
     */
    public function index() {
        $this->load->model('page_model');
        $alias = "test";
        $currPage = $this->page_model->getPageByAlias($alias);
        $pageNav = $this->page_model->getAllPages();

        $this->load->model('contentarea_model');
        $contentAreas = $this->contentarea_model->getContentAreas();

        $this->load->model('article_model');
        $articles = $this->article_model->getAllArticlesByPageID($currPage->getId());

        $this->load->model('stylesheet_model');
        $activeSheet = $this->stylesheet_model->getActiveStyleSheet();

        $data['alias'] = $contentAreas[0]->getName();
        $data['sheet'] = $activeSheet;
        $data['currentPage'] = $currPage;
        $data['allPages'] = $pageNav;
        $data['contentAreas'] = $contentAreas;
        $data['articles'] = $articles;

        $this->load->helper('url');
        $this->load->view('homepage', $data);

    }

    public function loadPage($alias) {
        $this->load->model('page_model');
        $currPage = $this->page_model->getPageByAlias($alias);
        $pageNav = $this->page_model->getAllPages();

        $this->load->model('contentarea_model');
        $contentAreas = $this->contentarea_model->getContentAreas();

        $this->load->model('article_model');
        $articles = $this->article_model->getAllArticlesByPageID($currPage->getId());

        $this->load->model('stylesheet_model');
        $activeSheet = $this->stylesheet_model->getActiveStyleSheet();

        $data['alias'] = $contentAreas[0]->getName();
        $data['sheet'] = $activeSheet;
        $data['currentPage'] = $currPage;
        $data['allPages'] = $pageNav;
        $data['contentAreas'] = $contentAreas;
        $data['articles'] = $articles;

        $this->load->helper('url');
        $this->load->view('homepage', $data);
    }

}
