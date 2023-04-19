<?php 

namespace Formation\Cours;

class Views {
    private static $template_dir = './views/';
    private string $view;
    private string $head;
    private string $header;
    private string $footer;
    private array $vars=[];
    public function __construct($view)
    {
        $this->view = self::$template_dir.$view.'.php';
        $this->setHead();
        $this->setFooter();
        $this->setHeader();
    }

    private function setHead()
    {
        $this->head = self::$template_dir.'template/head.php';
    }

    private function getHead()
    {
        return $this->head;
    }

    private function setFooter()
    {
        $this->footer = self::$template_dir.'template/footer.php';
    }

    private function setHeader()
    {
        $this->header = self::$template_dir.'template/header.php';
    }

    public function setVar($name,$value)
    {
        $this->vars[$name] = $value;
    }

    public function render()
    {
        extract($this->vars);
        require($this->head);
        require($this->header);
        require($this->view);
        require($this->footer);
    }
}