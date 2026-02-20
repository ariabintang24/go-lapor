@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                {{-- HEADER --}}
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Reach out to us</h2>
                    <p class="text-muted">
                        From strategy to execution, we craft digital solutions
                        that move your business forward.
                    </p>
                </div>

                {{-- FORM --}}
                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <form action="https://api.web3forms.com/submit" method="POST">

                        {{-- 🔑 WEB3FORMS ACCESS KEY --}}
                        <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">

                        {{-- Optional: Redirect After Success --}}
                        <input type="hidden" name="redirect" value="{{ url('/contact?success=true') }}">

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label class="form-label">Your name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text" name="name" required
                                    class="form-control border-start-0 rounded-end-3" placeholder="Enter your name">
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label">Email id</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" required
                                    class="form-control border-start-0 rounded-end-3" placeholder="Enter your email">
                            </div>
                        </div>

                        {{-- MESSAGE --}}
                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="5" required class="form-control rounded-3" placeholder="Enter your message"></textarea>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-grid">
                            <button type="submit" class="btn text-white fw-semibold py-2 rounded-pill"
                                style="background: linear-gradient(90deg, #5f4dee, #6f42c1);">
                                Submit →
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection
