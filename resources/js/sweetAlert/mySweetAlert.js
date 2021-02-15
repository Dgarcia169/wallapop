    function renderLoader() {
        swal.fire({
            title: "Cargando",
            text: "Por favor, espere",
            imageUrl: ASSETS + "/loader.svg",
            showConfirmButton: false,
            allowOutsideClick: false
        })
    }
    
    function closeLoader() {
        swal.close()
    }
    
     /*
     * Muestra los errores en un Sweet Alert
     *
     * @param {String} message
     * @param {String} textButton
     */
    function renderDialogFail(message, textButton = 'Cerrar') {
        swal.fire({
            text: message,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: textButton,
            customClass: {
                confirmButton: "btn btn-secondary font-weight-bold"
            }
        })
    }
    
    
    /**
     * Muestra un simbolo de que todo ha ido correcto
     *
     * @param {String} [message = String]
     * @param {String} [textButton = String]
     * @param {Function} [callback = ()=>{}]
     *
     */
    function renderDialogValid(message = "", textButton = "Cerrar", callback = () => {}) {
        swal.fire({
            text: message,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: textButton,
            customClass: {
                confirmButton: "btn btn-primary font-weight-bold"
            }
        }).then(callback)
}