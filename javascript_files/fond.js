document.addEventListener('DOMContentLoaded', function() {
    // تأخير بسيط لضمان تحميل كل العناصر
    setTimeout(function() {
        // 1. محاكاة فتح قائمة التصدير
        const exportCheckbox = document.getElementById('export-file');
        if(exportCheckbox) exportCheckbox.checked = true;
        
        // 2. محاكاة النقر على زر PDF بعد تأخير إضافي
        setTimeout(function() {
            const pdfButton = document.getElementById('toPDF');
            if(pdfButton) {
                if(printWindow) {
                    printWindow.document.write(`
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <title>Contrat de Location</title>
                            <link rel="stylesheet" href="../css_files/contrat.css">
                            <style>
                                @media print {
                                    body { font-family: Arial; margin: 20px; }
                                    .action-buttons, .export__file { display: none !important; }
                                    table { border-collapse: collapse; width: 100%; }
                                    td { padding: 8px; border: 1px solid #ddd; }
                                    hr { margin: 15px 0; border: 0; border-top: 1px dashed #999; }
                                    .contract-container { page-break-after: always; }
                                }
                            </style>
                        </head>
                        <body>
                            ${printContent}
                            <script>
                                setTimeout(function() {
                                    window.print();
                                    window.close();
                                }, 500);
                            <\/script>
                        </body>
                        </html>
                    `);
                    printWindow.document.close();
                } else {
                    console.error('Failed to open print window. Popup may be blocked.');
                    window.print(); // Fallback to printing current window
                }
            }
        }, 300);
    }, 500);
});