<!DOCTYPE html>
<html>
<head>
    <title>Welcome Entry Email</title>
</head>
<body>
    <h1>New Form Submission</h1>

    <p><strong>Title:</strong> {{ $title }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Address:</strong> {{ $address }}</p>
    <p><strong>Postcode:</strong> {{ $postcode }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong> {{ $message }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Invited By:</strong> {{ $invited_by }}</p>
    <p><strong>Visit Number:</strong> {{ $visit_number }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Age:</strong> {{ $age }}</p>
    <p><strong>About You:</strong> {{ implode(', ', $about_you) }}</p> <p><strong>Sunday School:</strong> {{ $sunday_school }}</p>
    <p><strong>More Info:</strong> {{ $more_info }}</p>
    <p><strong>Prayer Request Comments:</strong> {{ $prayer_request_comments }}</p>
</body>
</html>