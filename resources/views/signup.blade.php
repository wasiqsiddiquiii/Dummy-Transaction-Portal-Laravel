<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="signup" method="post">
@csrf
    <input type="text" name="name" id="" />
    <input type="email" name="email" id="" />
    <input type="password" name="password" id="" />
    <select name="role" id="">

        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <input type="submit" value="Signup">

    </form>
</body>
</html>