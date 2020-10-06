<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container" id="addStudentdiv">
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4"> Add New Student </h1>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="addstudent.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="profile" name="profile">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
					          		<label class="form-check-label" for="male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
					          		<label class="form-check-label" for="female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" name="address"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			SAVE
					   		</button>
					    </div>
					</div>


				</form>
			</div>
		</div>
	</div>
	<div class="container" id="editStudentdiv">
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4">Edit Student  </h1>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="updatestudent.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for=" edit_profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="edit_profile" name="edit_profile">
					    	<input type="hidden" name="old_photo" id="old_photo">
					    	<img src="" id="edit_img" width="100" height="100" class="d-block mt-1">
					    </div>
					</div>

					<div class="form-group row">
						<label for="edit_name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="edit_name" placeholder="Enter Name" name="edit_name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="edit_name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="edit_name" placeholder="Enter Email" name="edit_email">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="edit_gender" id="edit-male" value="Male" >
					          		<label class="form-check-label" for="edit_male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="edit_gender" id="edit_female" value="Female">
					          		<label class="form-check-label" for="edit_female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="edit_address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" name="edit_address"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			Update
					   		</button>
					    </div>
					</div>


				</form>
			</div>
		</div>
	</div>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th> # </th>
				<th> Name </th>
				<th> Gender </th>
				<th> Email </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>


<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function(){
		$("#addStudentdiv").show();
		$("#editStudentdiv").hide();
		showData();
		function showData(){
			$.get('student.json',function(response){
				console.log(response);

				if(response){
					// var stuArray=JSON.parse(response);
					var html='';
					var j=1;
					$.each(response,function(i,v){
						html+=`<tr>
						        <td>${j++}</td>
						        <td>${v.name}</td>
						        <td>${v.email}</td>
						        <td>${v.gender}</td>
						        <td><button class="btn btn-primary btn-sm detail" data-id="${i}" data-name="${v.name}" data-gender="${v.gender}" data-email="${v.email}" data-address="${v.address}" data-profile="${v.profile}">Detail</button>
						        <button class="btn btn-warning btn-sm edit" data-id="${i}" >Edit</button>
						        <button class="btn btn-danger btn-sm delete" data-id="${i}">Delete</button>

						        </td>
						       </tr>`;
					});
					$("tbody").html(html);
				}
			})
		}
		$("tbody").on("click",".detail",function(){
			var id=$(this).data('id');
			var name=$(this).data('name');
			var gender=$(this).data('gender');
			var address=$(this).data('address');
			var profile=$(this).data('profile');
			var email=$(this).data('email');
			$("#stu-img").attr('src',profile);
			$("#stu-name").text("Name: "+name);
			$("#stu-email").text("Email: "+email);
			$("#stu-gender").text("Gender: "+gender);
			$("#stu-address").text("Address: "+address);
			$("#deatalModal").modal('show');
		});
			$("tbody").on("click",".delete",function(){
				var id=$(this).data('id');
				var ans=confirm("Are youu sure delete");
				if(ans){
					$.post('deletestudent.php',{id:id},function(response){
						showData();
					})
				}
			})
		$("tbody").on("click",".edit",function(){
			$("#addStudentdiv").hide();
		$("#editStudentdiv").show();
		var id=$(this).data('id');

        $.get("student.json",function(response){
        	// console.log(typeof(response));**
        
        	var edit_name= response[name];
        	var edit_email=response[email];
        	var edit_gender=response[gender];
        	var edit_address=response[address];
        	var edit_profile=response[profile];

            $("#edit_id").val(id);
            $("#edit_img").attr("src",edit_profile);
            $("#edit_name").val(edit_name);
            $("#edit_email").val(edit_email);
            $("#edit_address").val(edit_address);
            $("old_photo").val(edit_profile);
            if(edit_gender=="Male"){
            	$("#edit_male").prop("checked","checked");
                }
                else{
                	$("#edit_female").prop("checked","checked");
                }
            

        	
        })
		})
	})
</script>
<div class="modal" id="deatalModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        	<div class="row">
        		<div class="col-md-5">
        			<img src="" id="stu-img" class="img-fluid">
        			
        		</div>
        		<div class="col-md-7">
        			<p id="stu-name"></p>
        			<p id="stu-email"></p>
        			<p id="stu-gender"></p>
        			<p id="stu-address"></p>
        			
        		</div>
        		
        	</div>
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

</body>
</html>