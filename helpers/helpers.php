<?php
function paginationLinks($current_page, $total_pages, $base_url)
{
    if ($total_pages <= 1) {
        return false;
    }
    if (!empty($_GET)) {
        unset($_GET['page']);
        $http_query = "?" . http_build_query($_GET);
    } else {
        $http_query = "?";
    }
    $html = '<ul class="pagination text-center">';
    if ($current_page == 1) {
        $html .= '<li class="disabled"><a>First</a></li>';
    } else {
        $html .= '<li><a href="' . $base_url . $http_query . '&page=1">First</a></li>';
    }
    if ($current_page > 5) {
        $i = $current_page - 4;
    } else {
        $i = 1;
    }
    for (; $i <= ($current_page + 4) && ($i <= $total_pages); $i++) {
        ($current_page == $i) ? $li_class = ' class="active"' : $li_class = '';
        $link = $base_url . $http_query;
        $html = $html . '<li' . $li_class . '><a href="' . $link . '&page=' . $i . '">' . $i . '</a></li>';
        if ($i == $current_page + 4 && $i < $total_pages) {
            $html = $html . '<li class="disabled"><a>...</a></li>';
        }
    }
    if ($current_page == $total_pages) {
        $html .= '<li class="disabled"><a>Last</a></li>';
    } else {
        $html .= '<li><a href="' . $base_url . $http_query . '&page=' . $total_pages . '">Last</a></li>';
    }
    $html = $html . '</ul>';
    return $html;
}

/**
 * to prevent xss
 */
function xss_clean($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}