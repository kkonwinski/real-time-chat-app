var validator = $( "#message" ).validate();
validator.element( "#message_content" );

$("#message").validate();
validator.showErrors({
    "message_content": "I know that your firstname is Pete, Pete!"
});