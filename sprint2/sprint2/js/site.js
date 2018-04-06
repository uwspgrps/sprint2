$(document).ready(function(){
    $('#contactForm').validate({
        rules: {
            firstName: {
                required: true
            },   
            lastName: {
                required: true
            }, 
            phoneNumber: {
                required: true
            },             
            email: {
                required: true,
                email: true
            },
            feedback: {
                required: true
            }
        },
        messages: {
            firstName: {
                required: 'First name is required.'
            },  
            lastName: {
                required: 'Last name is required.'
            }, 
            phoneNumber: {
                required: 'Phone number is required.'
            },             
            email: {
                required: 'Email address is required.',
                email: 'Invalid email address.'
            },
            feedback: {
                required: 'Feedback section is required.'
            }
        }
    });
    
    $('#submitBtn').click(function(){
        if($('#contactForm').valid()){
            $('#contactForm').submit();
        }
    });    
});