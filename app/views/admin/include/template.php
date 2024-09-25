<?php
$this->load->view("admin/include/header",["headerCss"=>$headerCss]);
$this->load->view("admin/include/menu",["menuActive"=>$menuActive,"subMenuActive"=>$subMenuActive]);
$this->load->view("admin/include/footer",["mainContent"=>$mainContent,
                                          "footerJs"=>$footerJs]
                  );
?>