const modalToggle = data => {
        if (data) {
            modal.classList.add('modal--close')
        } else {
            modal.classList.remove('modal--close')
        }
    }
    // modalBtn
modalBtn.addEventListener('click', () => { modalToggle(true) })

const sliderImages = images => {
    return new Promise((resolve, reject) => {
        sliderContent.innerHTML = ''
        sliderContent.style = `width: ${images.length}00%`
        for (let e = 0; e < images.length; e++) {
            // content section
            let slider__section = document.createElement('div')
            slider__section.setAttribute('class', 'slider__section')
                // content image
            let slider__content_image = document.createElement('div')
            slider__content_image.setAttribute('class', 'slider__content-image')
                //  image
            let slider_image = document.createElement('img')
            slider_image.setAttribute('class', 'slider__img')
            slider_image.setAttribute('src', images[e])
            slider__content_image.append(slider_image)
            slider__section.append(slider__content_image)
            sliderContent.append(slider__section)
        }
        resolve(true)
    })
}

const sliderPrev = () => {
    let sectionImages = document.querySelectorAll('.slider__section'),
        sectionLastImages = sectionImages[sectionImages.length - 1]
    sliderContent.style.marginLeft = '0%'
    sliderContent.style.trasition = 'all .0.5s ease'

    setTimeout(() => {
        sliderContent.style.trasition = 'none'
        sliderContent.insertAdjacentElement('afterbegin', sectionLastImages)
        sliderContent.style.marginLeft = '-100%'
    }, 500);

}
sliderButtonLeft.addEventListener('click', () => {
    sliderPrev()
})

const sliderNext = () => {
    const sectionFirstImages = document.querySelectorAll('.slider__section')[0]
    sliderContent.style.marginLeft = '-200%'
    sliderContent.style.trasition = 'all .0.5s ease'

    setTimeout(() => {
        sliderContent.style.trasition = 'none'
        sliderContent.insertAdjacentElement('beforeend', sectionFirstImages)
        sliderContent.style.marginLeft = '-100%'
    }, 500);

}
sliderButtonRight.addEventListener('click', () => {
    sliderNext()
})
const preview = image => {
    let preview_image = document.createElement('img')
    preview_image.setAttribute('class', 'image-preview')
    preview_image.setAttribute('src', image)
    imagePreview.append(preview_image)
}

// 
imagesData = document.querySelectorAll('img[data-images]')

imagesData.forEach(image => {
    image.addEventListener('click', async(e) => {
        const stringImg = e.target.dataset.images,
            arrayImages = stringImg.split(',')
        if (arrayImages) {
            const res = await sliderImages(arrayImages)
            if (res) {
                // slider
                let sectionImages = document.querySelectorAll('.slider__section')
                if (sectionImages.length > 1) {
                    sliderContent.style.marginLeft = '-100%'
                    sliderButtonLeft.style.display = 'block';
                    sliderButtonRight.style.display = 'block';
                    // poner ultima imagen de primeras
                    sliderContent.insertAdjacentElement('afterbegin', sectionImages[sectionImages.length - 1])
                } else {
                    sliderContent.style.marginLeft = '0'
                    sliderButtonLeft.style.display = 'none';
                    sliderButtonRight.style.display = 'none';
                }
                modalToggle(false)
            }
        }
    })
});

// DOM
// let imagesTable =
// imagen.addEventListener('change', async() => {
//     imagePreview.innerHTML = "Cargando..."
//     const arrayImages = await urlImages()

//     if (arrayImages) {
//         const res = await sliderImages(arrayImages)
//         imagePreview.innerHTML = ''
//         if (res) {
//             // slider
//             let sectionImages = document.querySelectorAll('.slider__section')
//             if (sectionImages.length > 1) {
//                 sliderContent.style.marginLeft = '-100%'
//                 sliderButtonLeft.style.display = 'block';
//                 sliderButtonRight.style.display = 'block';
//                 // poner ultima imagen de primeras
//                 sliderContent.insertAdjacentElement('afterbegin', sectionImages[sectionImages.length - 1])
//             } else {
//                 sliderContent.style.marginLeft = '0'
//                 sliderButtonLeft.style.display = 'none';
//                 sliderButtonRight.style.display = 'none';
//             }
//             preview(arrayImages[0])
//         }
//     } else {
//         imagePreview.innerHTML = ''
//     }
// })