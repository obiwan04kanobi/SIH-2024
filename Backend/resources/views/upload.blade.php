<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Upload Document</h2>
    <form id="uploadForm" enctype="multipart/form-data">
        <label for="file">Choose file:</label>
        <input type="file" id="file" name="file" required><br><br>

        <label for="document_type">Select Document Type:</label>
        <select id="document_type" name="document_type" required>
            <option value="10th">10th Marksheet</option>
            <option value="12th">12th Marksheet</option>
        </select><br><br>

        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <button type="submit">Upload</button>
    </form>

    <div id="response"></div>

    <script>
        $(document).ready(function() {
            // Set up the CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'http://localhost:8000/api/upload-document',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#response').html('<p>' + response.message + '</p>');
                        if (response.file_path) {
                            $('#response').append('<p>File URL: <a href="' + response
                                .file_path + '" target="_blank">' + response.file_path +
                                '</a></p>');
                        }
                    },
                    error: function(response) {
                        $('#response').html('<p>File upload failed. Please try again.</p>');
                    }
                });
            });
        });
    </script>


</body>

</html>
