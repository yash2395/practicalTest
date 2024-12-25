<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">

                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Add New Employee</h1>
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ old('first_name') }}" maxlength="50" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name') }}" maxlength="50" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" maxlength="100" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <div class="row gx-2">
                                    <div class="col-2">
                                        <select id="country_code" name="country_code" class="form-select @error('country_code') is-invalid @enderror">
                                            <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1</option>
                                            <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>+91</option>
                                            <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44</option>
                                        </select>
                                        @error('country_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-10">
                                        <input type="number" id="mobile" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                                            value="{{ old('mobile') }}" maxlength="15" placeholder="Mobile Number" required>
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                                    placeholder="Enter your address here">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="male" name="gender"
                                        value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="female" name="gender"
                                        value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="other" name="gender"
                                        value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hobbies</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('hobby') is-invalid @enderror" type="checkbox" id="reading" name="hobby[]"
                                        value="Reading" {{ is_array(old('hobby')) && in_array('Reading', old('hobby')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="reading">Reading</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('hobby') is-invalid @enderror" type="checkbox" id="sports" name="hobby[]"
                                        value="Sports" {{ is_array(old('hobby')) && in_array('Sports', old('hobby')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sports">Sports</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('hobby') is-invalid @enderror" type="checkbox" id="music" name="hobby[]"
                                        value="Music" {{ is_array(old('hobby')) && in_array('Music', old('hobby')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="music">Music</label>
                                </div>
                                @error('hobby')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
