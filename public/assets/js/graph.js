// document.addEventListener('DOMContentLoaded', function () {
//     // --- Récupération des données depuis PHP ---
//     // Utiliser @json pour convertir les tableaux PHP en objets/tableaux JS valides
//     // Accéder via $charts car on a passé $viewData à la vue
//     const revenueLabels = @json($charts['revenueLast7Days']['labels']);
//     const revenueData = @json($charts['revenueLast7Days']['data']);

//     const invoiceStatusLabels = @json($charts['invoiceStatus']['labels']);
//     const invoiceStatusData = @json($charts['invoiceStatus']['data']);
//     const invoiceStatusColors = @json($charts['invoiceStatus']['colors']);

//     // --- Configuration Graphique Revenus (Line) ---
//     const revenueCtx = document.getElementById('revenueChart');
//     if (revenueCtx) {
//         new Chart(revenueCtx, {
//             type: 'line',
//             data: {
//                 labels: revenueLabels,
//                 datasets: [{
//                     label: 'Revenu (€)',
//                     data: revenueData,
//                     borderColor: 'rgb(54, 162, 235)', // Bleu
//                     backgroundColor: 'rgba(54, 162, 235, 0.1)', // Bleu léger pour le fond
//                     fill: true, // Remplir la zone sous la ligne
//                     tension: 0.1 // Légère courbe
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 maintainAspectRatio: true, // ou false si vous gérez la hauteur via CSS
//                 scales: {
//                     y: {
//                         beginAtZero: true,
//                         ticks: {
//                             // Ajouter le symbole € aux labels de l'axe Y
//                             callback: function(value, index, values) {
//                                 return value + ' €';
//                             }
//                         }
//                     }
//                 },
//                 plugins: {
//                     tooltip: {
//                          callbacks: {
//                             label: function(context) {
//                                 let label = context.dataset.label || '';
//                                 if (label) {
//                                     label += ': ';
//                                 }
//                                 if (context.parsed.y !== null) {
//                                     // Formatage du tooltip pour afficher l'euro
//                                     label += new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(context.parsed.y);
//                                 }
//                                 return label;
//                             }
//                         }
//                     }
//                 }
//             }
//         });
//     } else {
//          console.error("Element canvas 'revenueChart' non trouvé.");
//     }


//     // --- Configuration Graphique Statuts (Doughnut) ---
//     const invoiceStatusCtx = document.getElementById('invoiceStatusChart');
//      if (invoiceStatusCtx) {
//         // Vérifier s'il y a des données à afficher pour éviter une erreur Chart.js
//         if (invoiceStatusData && invoiceStatusData.length > 0) {
//             new Chart(invoiceStatusCtx, {
//                 type: 'doughnut',
//                 data: {
//                     labels: invoiceStatusLabels,
//                     datasets: [{
//                         label: 'Nombre de Factures',
//                         data: invoiceStatusData,
//                         backgroundColor: invoiceStatusColors, // Utilise les couleurs définies dans le contrôleur
//                         hoverOffset: 4
//                     }]
//                 },
//                 options: {
//                     responsive: true,
//                     maintainAspectRatio: true,
//                     plugins: {
//                         legend: {
//                             position: 'bottom', // Afficher la légende en bas
//                         },
//                         tooltip: {
//                             callbacks: {
//                                  label: function(context) {
//                                     let label = context.label || '';
//                                     let value = context.parsed || 0;
//                                     let total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
//                                     let percentage = total > 0 ? ((value / total) * 100).toFixed(1) + '%' : '0%';
//                                     if (label) {
//                                         label += ': ';
//                                     }
//                                     label += value + ' (' + percentage + ')';
//                                     return label;
//                                 }
//                             }
//                         }
//                     }
//                 }
//             });
//         } else {
//              // Optionnel: Afficher un message s'il n'y a pas de données
//              const parentDiv = invoiceStatusCtx.parentElement;
//              if (parentDiv) {
//                  parentDiv.innerHTML = '<p class="text-center text-muted mt-3">Aucune donnée de statut de facture à afficher.</p>';
//              }
//         }
//     } else {
//          console.error("Element canvas 'invoiceStatusChart' non trouvé.");
//     }

// }); // Fin DOMContentLoaded
