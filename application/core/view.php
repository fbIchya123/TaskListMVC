<?php
class View{

    function generate($content_view, $template_view, $data = NULL){

        include 'application/views/' . $template_view;
    }
}   