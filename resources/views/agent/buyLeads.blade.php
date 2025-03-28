@extends('agent.app.app')
@section('title', 'Buy Leads')
@section('page_title', 'Buy Leads')

@section('css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: auto;
        }

        .inner-container {
            /* height: 100%; */
            /* overflow-y: auto; */
        }

        .lead-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            position: relative;
        }

        .lead-card .badge {
            position: absolute;
            top: -10px;
            left: 10px;
            background: black;
            color: white;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        .filter-btn {
            background: #d9534f;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        /* Bottom Sheet */
        .bottom-sheet {
            position: fixed;
            bottom: -100%;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 600px;
            background: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            transition: bottom 0.3s ease-in-out;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .bottom-sheet.active {
            bottom: 0;
        }

        .bottom-sheet .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: #d9534f;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
        }

        .accordion {
            background: #f1f1f1;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 16px;
            transition: 0.4s;
            margin-bottom: 5px;
        }

        .accordion-content {
            display: none;
            padding: 10px;
            background: white;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }

        /* Style Search Input */
        .filter-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
        }

        .filter-input:focus {
            border-color: #d9534f;
            outline: none;
            box-shadow: 0 0 5px rgba(217, 83, 79, 0.5);
        }
    </style>

    <style>
        .slider-container {
            position: relative;
            width: 100%;
            height: 50px;
            background: #fff;
            border: 2px solid #003366;
            border-radius: 25px;
            display: flex;
            align-items: center;
            overflow: hidden;
            user-select: none;
        }

        .slider-btn {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: grab;
            transition: background 0.3s;
        }

        .slider-btn i {
            color: white;
            font-size: 20px;
        }

        .slider-text {
            width: 100%;
            text-align: center;
            color: #003366;
            font-weight: bold;
            pointer-events: none;
        }

        /* .success {
            background: green !important;
        } */


    </style>
@endsection

@section('content')

    <div class="inner-container">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h3 class="m-0">All Leads</h3>
            <!-- Filter Button -->
            <button class="btn btn-danger p-2 rounded-circle" id="toggleFilter">
                <i class="bi bi-funnel text-white"></i> <!-- Funnel icon -->
            </button>
        </div>

        @foreach ($leads as $lead)
            <div class="lead-card my-5">
                <span class="badge">{{ $lead->package->destination->type ?? 'NA' }}</span>
                <h3>{{ $lead->name }}</h3>
                <p><small>Lead Added on
                        {{ \Carbon\Carbon::parse($lead->created_at)->format('F j, Y \a\t g:i:s A') }}</small></p>
                <div class="lead-info">
                    <p><strong>Lead ID:</strong> #{{ $lead->id }}</p>
                    <p><strong>No. of Travellers:</strong> {{ $lead->no_of_persons }} adult(s)</p>
                    <p><strong>Customer Location:</strong> {{ $lead->pickup_location }}</p>
                    <p><strong>Destination:</strong> {{ $lead->package->destination->title ?? 'NA' }}</p>
                    <p><strong>Price:</strong> ₹{{ number_format($lead->package->price, 2) }}</p>
                    <p><strong>Travel Date / Time:</strong>
                        {{ \Carbon\Carbon::parse($lead->expected_date)->format('F j, Y') }}
                        ({{ $lead->package->duration_nights }}N {{ $lead->package->duration_days }}D trip)
                    </p>
                </div>
                <div class="slider-container bg-light" style="">
                    <button type="submit" class="btn btn-secodary m-auto">Buy Lead</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Filter Bottom Sheet -->
    <div class="bottom-sheet" style="max-width:600px" id="filterSheet">
        <div class="d-flex justify-content-between align-items-top mb-1">
            <h4>Filter Leads</h4>
            <button class="btn btn-danger rounded-circle" id="closeFilter"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="accordion-container">
            <!-- Filter By City -->
            <button class="accordion">Filter By City</button>
            <div class="accordion-content">

                <input type="text" class="filter-input" name="city" placeholder="Enter city">
            </div>

            <!-- Filter By Latest To Old / Lead Cost -->
            <button class="accordion">Sort By</button>
            <div class="accordion-content">
                <select class="form-control" id="filterSort">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                    <option value="high">Highest Lead Cost</option>
                    <option value="low">Lowest Lead Cost</option>
                </select>
            </div>

            <!-- Filter By Type -->
            <button class="accordion">Filter By Type</button>
            <div class="accordion-content">
                <select class="form-control" id="filterType">
                    <option value="">Select Type</option>
                    <option value="domestic">Domestic</option>
                    <option value="international">International</option>
                </select>
            </div>

            <!-- Filter By Date -->
            <button class="accordion">Filter By Date</button>
            <div class="accordion-content">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <label for="start_date">From</label>
                        <input type="date" class="form-control" id="start_date">
                    </div>
                    <div>
                        <label for="end_date">To</label>
                        <input type="date" class="form-control" id="end_date">
                    </div>
                </div>
            </div>
            <button class="btn btn-danger mt-3 w-100 mb-5" id="applyFilters">Apply Filters</button>
        </div>

    </div>

@endsection

@section('javascript')
    <script>
        // Toggle Filter Bottom Sheet
        // Get elements
        const filterSheet = document.getElementById("filterSheet");
        const openFilterBtn = document.getElementById("toggleFilter");
        const closeFilterBtn = document.getElementById("closeFilter");

        // Toggle Filter Bottom Sheet
        openFilterBtn.addEventListener("click", function() {
            filterSheet.classList.toggle("active");
        });

        // Close Filter Bottom Sheet
        closeFilterBtn.addEventListener("click", function() {
            filterSheet.classList.remove("active");
        });



        // Accordion Toggle
        document.querySelectorAll(".accordion").forEach((accordion) => {
            accordion.addEventListener("click", function() {
                this.classList.toggle("active");
                let content = this.nextElementSibling;
                content.style.display = content.style.display === "block" ? "none" : "block";
            });
        });

        // Apply Filters (Integrate with Laravel for backend filtering)
        document.getElementById("applyFilters").addEventListener("click", function() {
            let city = document.getElementById("filterCity").value;
            let sort = document.getElementById("filterSort").value;
            let type = document.getElementById("filterType").value;
            let date = document.getElementById("filterDate").value;

            console.log("Filters Applied:", {
                city,
                sort,
                type,
                date
            });

            // Implement AJAX request to fetch filtered leads
        });
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let slider = document.getElementById("slider");
            let handle = document.getElementById("slider-handle");
            let isDragging = false;

            handle.addEventListener("mousedown", function(event) {
                isDragging = true;
                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", onMouseUp);
            });

            function onMouseMove(event) {
                if (!isDragging) return;
                let sliderRect = slider.getBoundingClientRect();
                let newLeft = event.clientX - sliderRect.left;

                if (newLeft < 0) newLeft = 0;
                if (newLeft > sliderRect.width - handle.offsetWidth) {
                    newLeft = sliderRect.width - handle.offsetWidth;
                    completePurchase();
                }

                handle.style.left = newLeft + "px";
            }

            function onMouseUp() {
                isDragging = false;
                document.removeEventListener("mousemove", onMouseMove);
                document.removeEventListener("mouseup", onMouseUp);
                handle.style.left = "0px";
            }

            function completePurchase() {
                alert("Lead Purchased Successfully!");
                handle.style.left = "0px";
            }
        });
    </script> --}}
@endsection
"
