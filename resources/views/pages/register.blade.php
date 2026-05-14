@extends('layout.master', ['nonav' => true, 'noFooter' => true])
@section('monkey')
    <style>
        .register-page {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #375E97, #b8bbc4);
            min-height: 100vh;
            padding: 24px 16px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: #fff;
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #375E97;
            margin-bottom: 20px;
            font-size: 28px;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 2px solid #375E97;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #6A89CC;
            box-shadow: 0 0 8px rgba(106, 137, 204, 0.5);
        }

        .radio-group {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
        }

        .radio-group label {
            font-weight: normal;
        }

        .checkbox {
            margin: 15px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #375E97;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #2c4a78;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 24px 18px;
            }

            .checkbox {
                align-items: flex-start;
            }
        }
    </style>

    <div class="register-page">
        <form class="form-container" method="POST" action="{{ route('register.submit') }}">
            @csrf
            <h2>SignUp</h2>

            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name" required />

            <label>Address</label>
            <input type="text" name="address" placeholder="Enter your address" required />

            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="98xxxxxxx" required />

            <label>Email</label>
            <input type="email" name="email" placeholder="example@gmail.com" required />
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required />

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Re-enter password" required />


            <label>Select Role</label>
            <select name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="tenant">Tenant</option>
                <option value="owner">Owner</option>
            </select>


            <div class="checkbox">
                <input type="checkbox" required />
                <label style="margin:0;">I agree to all terms and conditions</label>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
@endsection
