<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nouveta Staff Portal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/nav.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="shortcut icon" href="{{asset('img/nouveta.png')}}">



       
    </head>
    <body>
        <section>
        {{-- @include('includes.nav') --}}
            @yield('content')
        </section>

             <!-- scripts-->
        <script src="{{asset('js/jquery.min.js')}}"></script> 
        <script src="{{asset('js/materialize.min.js')}}"></script> 
        <script src="{{asset('js/moment.min.js')}}"></script> 
        <script src="{{asset('js/bootstrap.min.js')}}"></script> 
        <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script> 
        <script src="{{asset('js/velocity.min.js')}}"></script>
        <script src="{{asset('js/velocity.min.ui.js')}}"></script>
        

<script>
        feather.replace();

        $('.open-overlay').click(function() {
       $('.open-overlay').css('pointer-events', 'none');
       var overlay_navigation = $('.overlay-navigation'),
         top_bar = $('.bar-top'),
         middle_bar = $('.bar-middle'),
         bottom_bar = $('.bar-bottom');

       overlay_navigation.toggleClass('overlay-active');
       if (overlay_navigation.hasClass('overlay-active')) {

         top_bar.removeClass('animate-out-top-bar').addClass('animate-top-bar');
         middle_bar.removeClass('animate-out-middle-bar').addClass('animate-middle-bar');
         bottom_bar.removeClass('animate-out-bottom-bar').addClass('animate-bottom-bar');
         overlay_navigation.removeClass('overlay-slide-up').addClass('overlay-slide-down')
         overlay_navigation.velocity('transition.slideLeftIn', {
           duration: 300,
           delay: 0,
           begin: function() {
             $('nav ul li').velocity('transition.perspectiveLeftIn', {
               stagger: 150,
               delay: 0,
               complete: function() {
                 $('nav ul li a').velocity({
                   opacity: [1, 0],
                 }, {
                   delay: 10,
                   duration: 140
                 });
                 $('.open-overlay').css('pointer-events', 'auto');
               }
             })
           }
         })

       } else {
         $('.open-overlay').css('pointer-events', 'none');
         top_bar.removeClass('animate-top-bar').addClass('animate-out-top-bar');
         middle_bar.removeClass('animate-middle-bar').addClass('animate-out-middle-bar');
         bottom_bar.removeClass('animate-bottom-bar').addClass('animate-out-bottom-bar');
         overlay_navigation.removeClass('overlay-slide-down').addClass('overlay-slide-up')
         $('nav ul li').velocity('transition.perspectiveRightOut', {
           stagger: 150,
           delay: 0,
           complete: function() {
             overlay_navigation.velocity('transition.fadeOut', {
               delay: 0,
               duration: 300,
               complete: function() {
                 $('nav ul li a').velocity({
                   opacity: [0, 1],
                 }, {
                   delay: 0,
                   duration: 50
                 });
                 $('.open-overlay').css('pointer-events', 'auto');
               }
             });
           }
         })
       }
     });

     
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
       function hobbiesfuntion(){
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
           
        }

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
            // skillsfunction();
           
            hobbiesfuntion();
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
        
         hobbiesfuntion();
        try{
           

            skillsfunction();

        }catch(e){

            functionToHandleError(e);
        }
        
        

        

       

        // $('#the-skills').val(skills[0]);
        });


        




// Get the element, add a click listener...
document.getElementById("you_hover").addEventListener("click", function(e) {
	    // e.target is the CHANGING Element!
	    // If it was an input item
	    if(e.target && e.target.matches("input")) {
		// List item found!  Output the ID!
		// geting num of skills the user has input
        hobbiesfuntion();
	}
});

// Get the element, add a click listener...
document.getElementById("you_hover").addEventListener("click", function(e) {
	    // e.target is the CHANGING Element!
	    // If it was an input item
	    if(e.target && e.target.matches("textarea")) {
		// List item found!  Output the ID!
		// geting num of skills the user has input
        hobbiesfuntion();
	}
});

// Get the element, add a click listener...
document.getElementById("you_hover").addEventListener("pointermove", function(e) {
	    // e.target is the CHANGING Element!
	    // If it was an input item
	    if(e.target && e.target.matches("#usrform")) {
		// List item found!  Output the ID!
		// geting num of skills the user has input
        hobbiesfuntion();
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

    

    // image displayer
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
// end of image displayer

// date time picker

// end of dae time picker

</script>

        <!-- scripts-->
@yield('scripts')

           
    </body>
</html>
