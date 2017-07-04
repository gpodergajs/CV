<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<script>
    var id = 1;
</script>
<script>
    $('#addTask').on('click', 'button#btn-removeTask', function(events){
        $(this).parents('div').eq(1).remove();
        id--;

        if(id == 0){
            $("#alert-noTask").show();
        }

    });
</script>
<script>
    $('#addTask').on('click', 'button#btn-cloneTask', function(events){
        $(this).parents('div').eq(1).clone().insertAfter($(this).parents('div').eq(1));
        id++;
    });
</script>
<script>
   function newTask(){

       if(id == 0){
           $("#alert-noTask").hide();
       }

       var container_newTask = document.getElementById("container-newTask").innerHTML ;

       id++;

       $("#addTask").prepend(container_newTask);

   }
</script>
<script type="text/html" id="container-newTask">

    <div class="container col-md-12 bg-white border-1-ddd margin-t-5p padding-tb-15p newTask">
        <div class="container col-md-12">
            <h4>
                 <span style="float: left">
                  Naloga - <small class="font-light">najprej vpišite spodnje podatke*</small>
                 </span>
                <span style="float: right">
                    <button class="btn btn-info btn-xs font-light" style="font-size: 18px"
                            id="btn-cloneTask"
                            type="button">
                            <i class="fa fa-clone" aria-hidden="true"></i>

                     </button>
                     <button class="btn btn-danger btn-xs font-light" style="font-size: 18px"
                            id="btn-removeTask"
                            type="button">
                            <i class="fa fa-trash" aria-hidden="true"></i>

                    </button>
                 </span>
            </h4>
        </div>
        <div class="container col-md-3">
            <div class="form-group col-md-12 margin-t-5p">
                <p>Naziv</p>
                <input class="form-control border-radius-0 input" placeholder="Naziv naloge"
                       type="text"
                       name="task_title[]"
                       value="">
            </div>
        </div>
        <div class="container col-md-3">
            <div class="form-group col-md-12 margin-t-5p">
                <p>Vrednost naoge</p>
                <input  class="form-control border-radius-0 input"
                        id="value_num_max"
                        min="0" max="1000000"
                        type="number"
                        name="task_value_num_max[]"
                        value="">
            </div>
        </div>
        <div class="container col-md-3">
            <div class="form-group col-md-12 margin-t-5p">
                <p>Rok</p>
                <input class="form-control border-radius-0 input" placeholder=""
                       type="text"
                       id="date_selector"
                       name="task_date_deadline[]"
                       value="">
            </div>
        </div>
        <div class="container col-md-3 margin-t-5p">
            <div class="form-group col-md-12">
                <p>Prioriteta</p>
                <select class="form-control border-radius-0 input"
                        name="task_priority[]">

                    <option title="Nizka" class="text-muted" value="1">1</option>
                    <option title="Nizka"class="text-muted" value="2">2</option>
                    <option title="Nizka" class="text-muted" value="3">3</option>
                    <option title="Srednja" value="4">4</option>
                    <option title="Srednja" value="5">5</option>
                    <option title="Srednja" value="6">6</option>
                    <option title="Srednja" value="7">7</option>
                    <option title="Visoka" class="color-danger" value="8">8</option>
                    <option title="Visoka" class="color-danger" value="9">9</option>

                </select>
            </div>
        </div>

    </div>

</script>