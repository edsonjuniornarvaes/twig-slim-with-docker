<?php

namespace app\traits;

use app\src\Load;

trait View {

    protected $twig;

    protected function twig() {
        $loader = new \Twig_Loader_Filesystem('../app/views');

        $this->twig = new \Twig_Environment($loader, array(
            // 'cache' => '/path/to/compilation_cache',
            'debug' => true
        ));
    }

    protected function functions() {
        $functions = Load::file('/app/functions/twig.php');

        foreach($functions as $function) {
            $this->twig->addFunction($function);
        }
    }

    protected function load(){
        $this->twig();

        $this->functions();
    }

    protected function view($view, $data){
        $this->load();

        $template = $this->twig->loadTemplate(str_replace('.', '/', $view).'.twig');

        return $template->display($data);
    }

}