<div class="container">
    <h1>liste event</h1>
    <?php
    $this->table->set_heading('nomEvent','dateDebut','dateFin','lieu','voir');
    echo $this->table->generate($records);
    echo '<div>' . $this->pagination->create_links() . '</div>';
    
    
    
    
    ?>
</div>