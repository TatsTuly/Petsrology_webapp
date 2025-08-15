
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Adoption Management | PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            margin: 0;
            min-height: 100vh;
        }
        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 24px 0 18px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .admin-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .admin-logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        .brand-text h1 {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 2px;
            background: linear-gradient(45deg, #fff, #ecf0f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .admin-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logout-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }
        .logout-btn:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        .admin-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .admin-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 18px;
            color: #2c3e50;
        }
        .admin-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }
        .admin-tab-btn {
            background: #fff;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 10px 28px;
            border-radius: 20px 20px 0 0;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.2s;
            outline: none;
        }
        .admin-tab-btn.active, .admin-tab-btn:hover {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: #fff;
            border-bottom: 2px solid #fff;
        }
        .admin-tab-content {
            background: #fff;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 4px 18px rgba(52, 152, 219, 0.08);
            padding: 32px 28px 24px 28px;
            min-height: 320px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-label {
            font-weight: 700;
            color: #34495e;
            margin-bottom: 6px;
            display: block;
        }
        .form-control, .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #bfc9d1;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 2px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: #fff;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="brand-text">
                    <h1>Admin Panel</h1>
                </div>
            </div>
            <div class="admin-nav">
                <a href="{{ url('/admin/adoption-management') }}" class="btn btn-light" style="color:#fff;font-weight:700;">Adoption Management</a>
                <a href="{{ url('/admin/dashboard') }}" class="btn btn-light" style="color:#fff;font-weight:700;">Dashboard</a>
                <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <div class="admin-container">
        <div class="admin-title">Adoption Management</div>
        @if(session('success'))
        <div style="background:linear-gradient(135deg,#d4fc79 0%,#96e6a1 100%);color:#155724;padding:18px 24px;border-radius:12px;margin-bottom:22px;font-weight:700;box-shadow:0 2px 10px rgba(76,175,80,0.08);display:flex;align-items:center;gap:12px;">
            <i class="fas fa-check-circle" style="font-size:1.5rem;"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        <div class="admin-tabs">
            <button class="admin-tab-btn active" onclick="showTab('create')" id="tab-create">Create Post</button>
            <button class="admin-tab-btn" onclick="showTab('update')" id="tab-update">Update Post</button>
            <button class="admin-tab-btn" onclick="showTab('delete')" id="tab-delete">Delete Post</button>
            <button class="admin-tab-btn" onclick="showTab('request')" id="tab-request">Adoption Requests</button>
        </div>
        <div class="admin-tab-content" id="tab-content-create">
            <form action="{{ route('admin.adoption.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="adoption_number" class="form-label">Adoption Number</label>
                    <input type="text" class="form-control" id="adoption_number" name="adoption_number" required>
                </div>
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="pet_name" class="form-label">Pet Name</label>
                    <input type="text" class="form-control" id="pet_name" name="pet_name" required>
                </div>
                <div class="form-group">
                    <label for="pet_age" class="form-label">Pet Age</label>
                    <input type="number" class="form-control" id="pet_age" name="pet_age" required>
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="character" class="form-label">Character</label>
                    <input type="text" class="form-control" id="character" name="character" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn-primary">Create Post</button>
            </form>
        </div>
        <div class="admin-tab-content" id="tab-content-update" style="display:none;">
            <form method="GET" action="" id="searchUpdateForm" style="margin-bottom:18px;display:flex;gap:12px;align-items:center;">
                <input type="text" class="form-control" name="update_adoption_number" id="update_adoption_number" placeholder="Enter Adoption Number" required style="max-width:220px;">
                <button type="button" class="btn-primary" onclick="searchAdoptionPost('update')">Search</button>
            </form>
            <div id="updateFormContainer"></div>
        </div>
        <div class="admin-tab-content" id="tab-content-delete" style="display:none;">
            <form method="GET" action="" id="searchDeleteForm" style="margin-bottom:18px;display:flex;gap:12px;align-items:center;">
                <input type="text" class="form-control" name="delete_adoption_number" id="delete_adoption_number" placeholder="Enter Adoption Number" required style="max-width:220px;">
                <button type="button" class="btn-primary" style="background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%);" onclick="searchAdoptionPost('delete')">Search</button>
            </form>
            <div id="deleteFormContainer"></div>
        </div>
        <div class="admin-tab-content" id="tab-content-request" style="display:none;">
            <!-- List adoption requests here -->
        </div>
    </div>
    <script>
        // AJAX search and form rendering for update/delete
        function searchAdoptionPost(type) {
            const adoptionNumber = document.getElementById(type + '_adoption_number').value;
            if (!adoptionNumber) return;
            fetch(`/admin/adoption-management/search/${adoptionNumber}`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.id) {
                        if (type === 'update') renderUpdateForm(data);
                        else renderDeleteForm(data);
                    } else {
                        document.getElementById(type + 'FormContainer').innerHTML = `<div style='color:#e74c3c;font-weight:700;'>No adoption post found for this number.</div>`;
                    }
                })
                .catch(() => {
                    document.getElementById(type + 'FormContainer').innerHTML = `<div style='color:#e74c3c;font-weight:700;'>Error searching for adoption post.</div>`;
                });
        }

        function renderUpdateForm(post) {
            document.getElementById('updateFormContainer').innerHTML = `
                <form action="/admin/adoption-management/update/${post.id}" method="POST" enctype="multipart/form-data" style="margin-top:10px;">
                    <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                    <div class='form-group'><label class='form-label'>Adoption Number</label><input type='text' class='form-control' name='adoption_number' value='${post.adoption_number}' required></div>
                    <div class='form-group'><label class='form-label'>Title</label><input type='text' class='form-control' name='title' value='${post.title}' required></div>
                    <div class='form-group'><label class='form-label'>Pet Name</label><input type='text' class='form-control' name='pet_name' value='${post.pet_name}' required></div>
                    <div class='form-group'><label class='form-label'>Pet Age</label><input type='number' class='form-control' name='pet_age' value='${post.pet_age}' required></div>
                    <div class='form-group'><label class='form-label'>Gender</label><select class='form-select' name='gender' required><option value='Male' ${post.gender==='Male'?'selected':''}>Male</option><option value='Female' ${post.gender==='Female'?'selected':''}>Female</option></select></div>
                    <div class='form-group'><label class='form-label'>Character</label><input type='text' class='form-control' name='character' value='${post.character}' required></div>
                    <div class='form-group'><label class='form-label'>Description</label><textarea class='form-control' name='description' rows='3' required>${post.description}</textarea></div>
                    <div class='form-group'><label class='form-label'>Image</label><input type='file' class='form-control' name='image'></div>
                    <button type='submit' class='btn-primary'>Update Post</button>
                </form>
            `;
        }

        function renderDeleteForm(post) {
            document.getElementById('deleteFormContainer').innerHTML = `
                <div style='margin-bottom:12px;font-weight:700;'>Are you sure you want to delete this post?</div>
                <form action="/admin/adoption-management/delete/${post.id}" method="POST" style="margin-top:10px;">
                    <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                    <div class='form-group'><label class='form-label'>Adoption Number</label><input type='text' class='form-control' value='${post.adoption_number}' readonly></div>
                    <div class='form-group'><label class='form-label'>Pet Name</label><input type='text' class='form-control' value='${post.pet_name}' readonly></div>
                    <button type='submit' class='btn-primary' style='background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%);'>Delete Post</button>
                </form>
            `;
        }
        function showTab(tab) {
            const tabs = ['create', 'update', 'delete', 'request'];
            tabs.forEach(function(t) {
                document.getElementById('tab-content-' + t).style.display = (t === tab) ? '' : 'none';
                document.getElementById('tab-' + t).classList.toggle('active', t === tab);
            });
        }
    </script>
</body>
</html>
