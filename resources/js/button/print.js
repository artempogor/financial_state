
export function print(hottarray)
{
    function print (hottarray){
        for (let i=0; i<hotsarray.length; i++)
        {
            console.log(hotsarray[i]);
            hotsarray[i].toHTML();
        }
    const iframe = document.createElement('iframe');

    iframe.style.cssText = 'display: none';
    document.body.appendChild(iframe);
    const doc = iframe.contentDocument;
    doc.open('text/html', 'replace');
    };
    doc.write(`<!doctype html><html xmlns="http://www.w3.org/1999/html"><head>
  <style>
    @media print {
      table {
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid #ccc;
        min-width: 50px;
        padding: 2px 4px;
      }
      th {
        background-color: #f0f0f0;
        text-align: center;
        font-weight: 400;
        white-space: nowrap;
        -webkit-print-color-adjust: exact;
      }
    }
  </style>
  </head><body>${print}}</body></html>`);
    doc.close();
    doc.defaultView.print();
    setTimeout(() => {
        iframe.parentElement.removeChild(iframe);
    }, 10);
}