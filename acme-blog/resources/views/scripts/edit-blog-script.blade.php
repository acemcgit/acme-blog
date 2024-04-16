<script>
    var blog = @json($blog);
    $("#edit-blog").click((e)=>{
            e.preventDefault();

            var title = $("#title").val();
            var description = $("#description").val();
            var content = $("#content").val();
            $.ajax({
                url: `/update-blog/${blog.id}`,
                type: 'PUT',
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
                        alert('Success!')
                    } else {
                        alert('Error! Contact Admin');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error! Contact Admin');
                }
            });
    })
</script>