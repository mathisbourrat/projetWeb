<div class="container">
    <div class="row">    
        <div class="my-result">
        <div class="col-lg-6 text-center">
            

            <img class="my-img" src="<?php echo base_url("./assets/image/Event/") . $event[0]->imageEvent; ?>">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 my-result2">
            
            <h1><?php echo $event[0]->nomEvent; ?></h1>
        
            <h2>Du <?php echo $event[0]->dateDebut; ?> au <?php echo $event[0]->dateFin; ?> !</h2>
            <h3><?php echo $event[0]->lieu; ?></h3>
            <h4><?php echo $event[0]->description; ?></h4>
            
            <button class="btn-default btn-info text-center" id="myBtn">Contact</button>


        </div>
        
   

<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content text-center">
    <span class="close text-center">&times;</span>
    <p><h4>téléphone :</h4><?php echo $organisateur[0]->telOrga; ?> </p>
    <p><h4>mail: :</h4><?php echo $organisateur[0]->mailOrga; ?> </p>
  </div>

</div>

 </div>
        </div>




<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

    
</div>




