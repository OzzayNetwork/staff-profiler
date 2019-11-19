<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','staff profile')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">

       
    </head>
    <body>
        {{-- @include('includes.nav') --}}
            @yield('content')

             <!-- scripts-->
        <script src="{{asset('js/jquery.min.js')}}"></script> 
        <script src="{{asset('js/materialize.min.js')}}"></script> 
        

<script>
        feather.replace()
        $('.chips').chips();
        $('.chips-placeholder-skills').chips({
            placeholder: 'Enter a Skill',
            secondaryPlaceholder: '+ Skill',
        });

        
        
        $('.chips-placeholder').chips({
            placeholder: 'Enter a hobby',
            secondaryPlaceholder: '+ Hobby',
        });

         //     store chip data in an array
        var skills = M.Chips.getInstance($(".chips-placeholder-skills")).chipsData;
        var hobby = M.Chips.getInstance($(".chips-placeholder")).chipsData;
        

        $("#chips-click").on('click', function(){
           console.log("clicked again");
       });

       function skillsfunction(){
           //code that causes an error
            // geting num of skills the user has input
            var numOfSkills=skills.length;
            //creating skills array
            var skillArray="";
            for (let i=0; i<=numOfSkills; ++i){

            try{
                skillArray=skillArray.concat(skills[i].tag).concat(";");
            $('#the-skills').val(skillArray);

            //code that causes an error
            }catch(e){

                functionToHandleError(e);
            }
            }
       }

       $(document).on('keypress',function(e) {
        if(e.which == 13) {
            skillsfunction();
            }
        });


       //form submitting function
       $('button').on('click',function(e){
        try{

            skillsfunction();

        }catch(e){

            functionToHandleError(e);
        }
       });
       $( '#usrform' ).submit(function( event ) {
         // display chip data
        try{

            //creating hobby array
        
            var hobbyArray="";
            var numOfhobbies=hobby.length;

            //code that causes an error
            for (let x=0; x<= numOfhobbies; ++x){

                hobbyArray=hobbyArray.concat(hobby[x].tag).concat(";");
                $('#the-hobbies').val(hobbyArray);
            
        }

        }catch(e){

            functionToHandleError(e);
        }

        try{

            skillsfunction();

        }catch(e){

            functionToHandleError(e);
        }
        
        

        

       

        // $('#the-skills').val(skills[0]);
        });


        




// Get the element, add a click listener...
document.getElementById("skills-input").addEventListener("mousemove", function(e) {
	    // e.target is the CHANGING Element!
	    // If it was an input item
	    if(e.target && e.target.matches(".input")) {
		// List item found!  Output the ID!
		// geting num of skills the user has input
        var numOfSkills=skills.length;
        //creating skills array
        var skillArray="[";
        for (let i=0; i<=numOfSkills; ++i){
            if(i==numOfSkills-1){
               
                skillArray=skillArray.concat("'").concat(skills[i].tag).concat("']");
                $('#the-skills').val(skillArray);
            }
            if(i!=numOfSkills-1){
                
                skillArray=skillArray.concat("'").concat(skills[i].tag).concat("',");
                $('#the-skills').val(skillArray);
            }
        }
	}
});


// Get the element, add a click listener...
document.getElementById("skills-input").addEventListener("submit", function(e) {
	    // e.target is the CHANGING Element!
	    // If it was an input item
	    if(e.target && e.target.matches(".input")) {
		// List item found!  Output the ID!
		// geting num of skills the user has input
        var numOfSkills=skills.length;
        //creating skills array
        var skillArray="[";
        for (let i=0; i<=numOfSkills; ++i){
            if(i==numOfSkills-1){
               
                skillArray=skillArray.concat("'").concat(skills[i].tag).concat("']");
                $('#the-skills').val(skillArray);
            }
            if(i!=numOfSkills-1){
                
                skillArray=skillArray.concat("'").concat(skills[i].tag).concat("',");
                $('#the-skills').val(skillArray);
            }
        }
	}
});


        
    </script> 
<!--	script--> 


<script>
function showimage(){
if(this.files && this.files[0]){
var obj=new FileReader();
obj.onload=function(data){
var image=document.getElementById("prof-picture");
image.src=data.target.result;
image.style.display="block";
}
obj.readAsDataURL(this.files[0]);
}
}

</script>

        <!-- scripts-->

           
    </body>
</html>
