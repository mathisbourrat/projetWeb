<div class="container">
    <h2>liste event</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    
        <div class="table-responsive">
    <?php
    
    
    $this->table->set_heading('nomEvent','dateDebut','dateFin','lieu','voir');
    echo $this->table->generate($records);
    echo '<div class="pagination">' . $this->pagination->create_links() . '</div>';
    ?>
    </div>
    </div>
    
   </div>
</div>
-