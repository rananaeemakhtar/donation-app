<!DOCTYPE html>
<html>
<head>
    <title>Welcome Entry Email</title>
</head>
<body>
    <h1>New Form Submission</h1>

    <p><strong>Title:</strong> {{ $data['title'] }}</p>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Address:</strong> {{ $data['address'] }}</p>
    <p><strong>Postcode:</strong> {{ $data['postcode'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Invited By:</strong> {{ $data['invited_by'] }}</p>
    <p><strong>Visit Number:</strong> {{ $data['visit_number'] }}</p>
    <p><strong>Date:</strong> {{ $data['date'] }}</p>
    <p><strong>Age:</strong> {{ $data['age'] }}</p>
    <p><strong>About You:</strong> {{ implode(', ', $data['about_you']) }}</p> <p><strong>Sunday School:</strong> {{ implode(', ', $data['about_you']) }}</p>
    <p><strong>More Info:</strong> {{ implode(', ', $data['more_info']) }}</p>
</body>
</html>