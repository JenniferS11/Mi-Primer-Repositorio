function loadImage(url) {
  return new Promise(resolve => {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);
      xhr.responseType = "blob";
      xhr.onload = function (e) {
          const reader = new FileReader();
          reader.onload = function(event) {
              const res = event.target.result;
              resolve(res);
          }
          const file = this.response;
          reader.readAsDataURL(file);
      }
      xhr.send();
  });
}



let signaturePad = null;

window.addEventListener('load', async () => {

  const canvas = document.querySelector("canvas");
  canvas.height = canvas.offsetHeight;
  canvas.width = canvas.offsetWidth;

  signaturePad = new SignaturePad(canvas, {});

  const form = document.querySelector('#form');
  form.addEventListener('submit', (e) => {
      e.preventDefault();

      let escenario = document.getElementById('escenario').value;
      let tipopracticas = document.querySelector('input[name="tipopracticas"]:checked').value;
      
     
      let fechainicio = document.getElementById('fechainicio').value;
      let fechafin = document.getElementById('fechafin').value;
      let semestre = document.getElementById('semestre').value;
     
      
      generatePDF(escenario,  fechainicio, fechafin, semestre,  tipopracticas);
  })

});

async function generatePDF(escenario,fechainicio, fechafin, semestre,  tipopracticas) {
  const image = await loadImage("recursos/imgs/Group.jpg");
  const signatureImage = signaturePad.toDataURL();

  const pdf = new jsPDF('landscape', 'pt', 'a4');

  pdf.addImage(image, 'PNG', 0, 0, 850, 594);

  pdf.setFontSize(10);
  pdf.text(escenario, 241, 153);


 

  pdf.setFontSize(10);
  pdf.text(fechainicio, 165, 216);
  pdf.text(fechafin, 195, 237);
  
  pdf.text(semestre, 210, 195);

  pdf.setFillColor(0,0,0);

 

 if (parseInt(tipopracticas) === 0) {
      pdf.text(550, 175, 'X')
  } else if (parseInt(tipopracticas) === 1) {
      pdf.text(400, 175, 'X')
     
  } else
  {
      pdf.text(313, 175, 'X')
  }

  pdf.save("Informe.pdf");


  
 
}