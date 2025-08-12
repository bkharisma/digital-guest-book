<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu - Politeknik Pariwisata Palembang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .step {
      height: 35px;
      width: 35px;
      line-height: 35px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background-color: #e0e0e0;
      color: #555;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .step.active {
      background-color: #3b82f6;
      color: white;
      transform: scale(1.1);
      box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
    }

    .tab {
      display: none;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .btn {
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-primary {
      background-color: #3b82f6;
      color: white;
      border: none;
    }

    .btn-primary:hover {
      background-color: #2563eb;
      transform: translateY(-2px);
    }

    .btn-secondary {
      background-color: #e0e0e0;
      color: #555;
      border: none;
      margin-right: 10px;
    }

    .btn-secondary:hover {
      background-color: #d1d1d1;
      transform: translateY(-2px);
    }

    .input-field {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      transition: all 0.3s ease;
      font-size: 16px;
    }

    .input-field:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
      outline: none;
    }

    .select-field {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: white;
      font-size: 16px;
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 1rem center;
      background-size: 1em;
    }

    .card {
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      max-width: 800px;
    }

    .header-bg {
      background: linear-gradient(90deg, #1e3a8a 0%, #3b82f6 100%);
    }

    .progress-container {
      position: relative;
      height: 8px;
      background-color: #e0e0e0;
      border-radius: 4px;
      overflow: hidden;
      margin-top: 10px;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, #3b82f6, #60a5fa);
      border-radius: 4px;
      transition: width 0.4s ease;
    }
  </style>
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

</head>
<body class="py-8 px-4">
  <!-- Header dengan identitas website -->
  <div class="card">
    <div class="header-bg text-white rounded-2xl shadow-xl overflow-hidden">
      <div class="flex flex-col md:flex-row items-center p-6">
        <div class="flex items-center justify-center w-20 h-20 bg-white rounded-full mr-6 mb-4 md:mb-0">
          <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16" >
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
          </div>
        </div>
        <div class="flex-1 text-center">
          <h1 class="text-2xl md:text-3xl font-bold ">Politeknik Pariwisata Palembang</h1>
          <p class="mt-2 opacity-90">Sistem Buku Tamu Digital</p>
        </div>
    </div>
  </div>

  <div class="card">
    <form id="myForm" action="{{ url ('/simpan-bukutamu')}}" method="POST" autocomplete="off" name="formInput" class="p-6 md:p-8">
      @csrf

      <div class="text-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Digital Guest Book</h1>
        <div class="mt-4 flex justify-center space-x-4">
          <span class="step active" id="step-1">1</span>
          <span class="step" id="step-2">2</span>
          <span class="step" id="step-3">3</span>
          <span class="step" id="step-4">4</span>
        </div>
        <div class="progress-container mt-4">
          <div class="progress-bar" style="width: 25%"></div>
        </div>
      </div>

      <!-- Tab 1: Informasi Pribadi -->
      <div class="tab" id="tab-1">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200">Informasi Pribadi</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="hp" class="block text-gray-700 mb-2 font-medium">No Handphone</label>
            <input type="text" name="hp" id="hp" class="input-field"
                   placeholder="Silahkan isi no handphone anda" minlength="8" maxlength="13"
                   data-parsley-type="integer" data-parsley-trigger="keyup" required />
          </div>

          <div>
            <label for="name" class="block text-gray-700 mb-2 font-medium">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="input-field"
                   placeholder="Silahkan isi nama anda" maxlength="30"
                   data-parsley-minwords="3" data-parsley-maxwords="30"
                   data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,30}[a-zA-Z]$)/"
                   data-parsley-trigger="keyup" required />
          </div>

          <div>
            <label for="gender" class="block text-gray-700 mb-2 font-medium">Jenis Kelamin</label>
            <select class="select-field" name="gender" id="gender" required>
              <option value="" selected disabled>Pilih Jenis Kelamin</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>

          <div>
            <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
            <input type="text" name="email" id="email" class="input-field"
                   placeholder="Silahkan isi email anda" maxlength="35"
                   data-parsley-type="email" data-parsley-trigger="keyup"
                   data-parsley-error-message="Email anda tidak mengandung '@gmail.com'" required />
          </div>

          <div>
            <label for="address" class="block text-gray-700 mb-2 font-medium">Alamat</label>
            <input type="text" name="address" id="address" class="input-field"
                   placeholder="Silahkan isi alamat anda" maxlength="50" required />
          </div>

          <div>
            <label for="age" class="block text-gray-700 mb-2 font-medium">Usia</label>
            <input type="text" name="age" id="age" class="input-field"
                   placeholder="Silahkan isi umur anda (contoh: 27)" maxlength="3"
                   onkeypress="return event.charCode >= 48 && event.charCode <=57"
                   data-parsley-type="integer" data-parsley-trigger="keyup" required />
          </div>
        </div>

        <div class="flex justify-end mt-8">
          <button type="button" class="btn btn-primary" onclick="run(1, 2);">Selanjutnya</button>
        </div>
      </div>

      <!-- Tab 2: Riwayat -->
      <div class="tab" id="tab-2">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200">Riwayat</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="institute" class="block text-gray-700 mb-2 font-medium">Nama instansi</label>
            <input type="text" name="institute" id="institute" class="input-field"
                   placeholder="Silahkan isi nama instansi anda" maxlength="35"
                   data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,35}[a-zA-Z]$)/"
                   data-parsley-trigger="keyup" required />
          </div>

          <div>
            <label for="nipnim" class="block text-gray-700 mb-2 font-medium">NIP/NIM</label>
            <input type="text" name="nipnim" id="nipnim" class="input-field"
                   placeholder="Silahkan isi nip/nim anda" maxlength="20"
                   onkeypress="return event.charCode >= 48 && event.charCode <=57"
                   data-parsley-type="integer" data-parsley-trigger="keyup" required />
          </div>

          <div>
            <label for="job" class="block text-gray-700 mb-2 font-medium">Pekerjaan</label>
            <select class="select-field" name="job" id="job" required>
              <option value="" selected disabled>Silahkan Pilih Pekerjaan</option>
              @foreach ($job as $p)
              <option value="{{ $p->id }}">{{$p->job_type}}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label for="education" class="block text-gray-700 mb-2 font-medium">Pendidikan</label>
            <select class="select-field" name="education" id="education" required>
              <option value="" selected disabled>Silahkan Pilih Pendidikan</option>
              @foreach ($education as $p)
              <option value="{{ $p->id }}">{{$p->education_type}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="flex justify-between mt-8">
          <button type="button" class="btn btn-secondary" onclick="run(2, 1);">Kembali</button>
          <button type="button" class="btn btn-primary" onclick="run(2, 3);">Selanjutnya</button>
        </div>
      </div>

      <!-- Tab 3: Pelayanan -->
      <div class="tab" id="tab-3">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200">Pelayanan</h3>

        <div class="grid grid-cols-1 gap-6">
          <div>
            <label for="service" class="block text-gray-700 mb-2 font-medium">Jenis Pelayanan</label>
            <select class="select-field" name="service" id="inlineFormCustomSelectPref" required>
              <option value="" selected disabled>Silahkan Pilih Jenis Pelayanan</option>
              @foreach ($service as $j)
              <option value="{{ $j->id }}">{{$j->service_type}}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label for="media" class="block text-gray-700 mb-2 font-medium">Kebutuhan Data</label>
            <select class="select-field" name="sub_categories" id="inlineFormCustomSelectPref" required>
              <option value="" selected disabled>Silahkan Pilih Kebutuhan Data</option>
              @foreach($categories as $group)
              <optgroup label="{{$group->categories_type }}">
                @foreach ($sub_categories as $s)
                @if($s->id_categories == $group->id)
                <option value="{{ $s->id}}">{{$s->sub_categories_type}}</option>
                @endif
                @endforeach
              </optgroup>
              @endforeach
            </select>
          </div>
        </div>

        <div class="flex justify-between mt-8">
          <button type="button" class="btn btn-secondary" onclick="run(3, 2);">Kembali</button>
          <button type="button" class="btn btn-primary" onclick="run(3, 4);">Selanjutnya</button>
        </div>
      </div>

      <!-- Tab 4: Tujuan -->
      <div class="tab" id="tab-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200">Tujuan</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="purpose" class="block text-gray-700 mb-2 font-medium">Tujuan</label>
            <select class="select-field" name="purpose" id="inlineFormCustomSelectPref" required>
              <option value="" selected disabled>Silahkan Pilih Tujuan</option>
              @foreach ($purpose as $p)
              <option value="{{ $p->id }}">{{$p->purpose_type}}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label for="temu" class="block text-gray-700 mb-2 font-medium">Bertemu</label>
            <select class="select-field" name="temu" id="inlineFormCustomSelectPref" required>
              <option value="" selected disabled>Silahkan Pilih Bertemu</option>
              @foreach ($temu as $t)
              <option value="{{ $t->id }}">{{$t->temu_type}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="cf-turnstile" data-sitekey="1x00000000000000000000AA" data-theme="light"></div>
        <div class="flex justify-between mt-8">
          <button type="button" class="btn btn-secondary" onclick="run(4, 3);">Kembali</button>
          <button type="submit" name="submit" class="btn btn-primary bg-blue-600 hover:bg-blue-700">Kirim Data</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    // Default tab
    document.addEventListener('DOMContentLoaded', function() {
      $(".tab").css("display", "none");
      $("#tab-1").css("display", "block");
      updateProgressBar(1);
    });

    function run(hideTab, showTab) {
      if(hideTab < showTab) {
        // Validation if press next button
        var currentTab = 0;
        x = $('#tab-'+hideTab);
        y = $(x).find("input, select, textarea");

        let isValid = true;
        y.each(function() {
          if ($(this).is(':required') && !$(this).val()) {
            $(this).css("border-color", "#ef4444");
            isValid = false;
          } else {
            $(this).css("border-color", "#d1d5db");
          }
        });

        if (!isValid) {
          alert("Silakan lengkapi semua bidang yang wajib diisi!");
          return false;
        }
      }

      // Update progress bar
      updateProgressBar(showTab);

      // Update active step
      $(".step").removeClass("active");
      for (let i = 1; i <= showTab; i++) {
        $("#step-"+i).addClass("active");
      }

      // Switch tab
      $("#tab-"+hideTab).css("display", "none");
      $("#tab-"+showTab).css("display", "block");
    }

    function updateProgressBar(step) {
      const progressPercentage = (step / 4) * 100;
      $(".progress-bar").css("width", progressPercentage + "%");
    }

    $('#hp').on('keyup', function() {
      $value = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'post',
        url: '{{ URL::to('cekcustomer') }}',
        dataType: 'json',
        data: {'search':$value},
        success: function(data) {
          $.each(data, function (i, id) {
            $('#name').val(data[0].name).attr('readonly', true).css('background-color' , '#f3f4f6').attr('disabled', true);
            $("#gender option[value="+data[0].gender).attr('selected', 'true');
            $("#gender").attr('disabled', true);
            $('#email').val(data[0].email).attr('readonly', true).css('background-color' , '#f3f4f6');
            $('#address').val(data[0].address).attr('readonly', true).css('background-color' , '#f3f4f6');
            $('#age').val(data[0].age).attr('readonly', true).css('background-color' , '#f3f4f6');
            $('#institute').val(data[0].institute).attr('readonly', true).css('background-color' , '#f3f4f6');
            $('#nipnim').val(data[0].nipnim).attr('readonly', true).css('background-color' , '#f3f4f6');
            $("#job option[value='"+data[0].id_job).attr('selected', 'true');
            $("#job").attr('disabled', true);
            $("#education option[value='"+data[0].id_education).attr('selected', 'true');
            $("#education").attr('disabled', true);
          });
        }
      });
    });

    // Initialize Parsley
    $(function() {
      $("#myForm").parsley();
    });
  </script>
</body>
</html>
