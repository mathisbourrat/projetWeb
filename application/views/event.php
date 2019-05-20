<div class="container">
    <div class="row">    


        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
            <div class="my-result">

                <img class="my-img" src="<?php echo base_url("./assets/image/Event/") . $event[0]->imageEvent; ?>">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h1 class="titre"><?php echo $event[0]->nomEvent; ?></h1>

            <div class="my-result2">


                <ul type="disc">
                    <li>
                <h2>Quand ? Du <?php echo $event[0]->dateDebut; ?> au <?php echo $event[0]->dateFin; ?> !</h2></li>
                    <li><h2>Où ? <?php echo $event[0]->lieu; ?></h2></li>
                    <li><h2>Quoi?! </h2><h4><?php echo $event[0]->description; ?></h4></li>
                </ul>
                <div class="text-center">
                    

                <button class="btn-default btn-info text-center" id="myBtn">Contact</button>
                <a href="<?php echo base_url("index.php/Benevoles/participer/".$event[0]->idEvent);?>"><button class="btn-default btn-success text-center">participer</button></a>
                </div>    
                
            </div>
                


        </div>




        <!-- Trigger/Open The Modal -->

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <ul>
                    <li><p><h4>téléphone: <?php echo $organisateur[0]->telOrga; ?></h4> </p></li>
                    <li><p><h4>mail: <?php echo $organisateur[0]->mailOrga; ?> </h4></p></li>
                </ul>
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
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</div>






