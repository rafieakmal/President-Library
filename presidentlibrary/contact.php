<div class="container py-4 py-lg-5">
        <section class="position-relative py-4 py-xl-5">
            <div id="map" class="d-none d-md-block position-absolute top-0 start-0 w-100 h-100"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.838112622777!2d107.16835761468616!3d-6.285000295451078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6984caf54df305%3A0xb7156354ad963e4d!2sPresident%20Univ.%20Kampus%2C%20Kuliah%20Kelas%20Karyawan%20Cikarang%20Bekasi!5e0!3m2!1sen!2sid!4v1650399255546!5m2!1sen!2sid" referrerpolicy="no-referrer-when-downgrade" width="100%" height="100%"></iframe></div>
            <div class="position-relative px-2 px-xl-5 py-5">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-md-6 col-xl-5 col-xxl-4 offset-md-6 offset-xl-7 offset-xxl-8">
                            <div>
                                <form class="border rounded shadow p-3 p-md-4 p-lg-5" id="my-form" action="https://formspree.io/f/xnqwodke" method="post" style="background: var(--bs-body-bg);">
                                    <h3 class="text-center mb-3">Contact us</h3>
                                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Name"></div>
                                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                    <div class="mb-3"><textarea class="form-control" name="message" placeholder="Message" rows="6"></textarea></div>
                                    <div class="mb-3"><button class="btn btn-primary" type="submit">Send </button></div>
                                    <p id="my-form-status"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

<script>
    var form = document.getElementById("my-form");
    async function handleSubmit(event) {
      event.preventDefault();
      var status = document.getElementById("my-form-status");
      var data = new FormData(event.target);
      fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
      }).then(response => {
        if (response.ok) {
          status.innerHTML = "Thanks for your response!";
          form.reset()
        } else {
          response.json().then(data => {
            if (Object.hasOwn(data, 'errors')) {
              status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
            } else {
              status.innerHTML = "Oops! There was a problem submitting your form"
            }
          })
        }
      }).catch(error => {
        status.innerHTML = "Oops! There was a problem submitting your form"
      });
    }
    form.addEventListener("submit", handleSubmit)
</script>