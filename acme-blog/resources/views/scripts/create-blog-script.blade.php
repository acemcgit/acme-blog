<script>
  
    $("#create-blog").click((e)=>{
            e.preventDefault();

            $("#title-err").html('');
            $("#desc-err").html('');
            $("#content-err").html('');

            var title = $("#title").val();
            var description = $("#description").val();
            var content = $("#content").val();
            $.ajax({
                url: `/store-blog`,
                type: 'POST',
                dataType: 'json',
                data: {
                    title: title,
                    description: description,
                    content: content,
                },
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                success: function(response, status, xhr) {
                    if (xhr.status === 200) {
                        alert('Success');
                        window.location.href = '/dashboard';
                    } else {
                        alert('Error! Contact Admin');
                        console.error('Error:', response);
                    }
                },
                error: function(xhr, status, error) {
                    
                    if (xhr.status === 422) {
                        // Validation error occurred
                        var errors = xhr.responseJSON.errors;

                        if(errors.title){
                            $("#title-err").html(errors.title);
                        }

                        if(errors.description){
                            $("#desc-err").html(errors.description); 
                        }

                        if(errors.content){
                            $("#content-err").html(errors.content);
                        }

                        console.log('Validation Errors:', errors);
                        // Display validation errors to the user
                    } else {
                        alert('Error! Contact Admin');
                        console.error('Error:', error);
                    }
                    
                }
            });
    })
</script>