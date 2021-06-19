<?php $this->view("template/header", $data);?>



<section class="section background-white">
  
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center"><?= $data['posts']->title?></h4>
              <img src="<?= ROOT. $data['posts']->image?>"/>
              <br>
              <?= $data['posts']->description?>
              
            </div>           
          </section>

<?php $this->view("template/footer", $data);?>  