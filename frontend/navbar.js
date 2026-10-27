/* navbar.js — Navigation partagée */

function getAuth() {
  try { return JSON.parse(localStorage.getItem('av_auth')); } catch { return null; }
}

function checkAuth() {
  const u = getAuth();
  if (!u) { window.location.href = 'index.html'; return null; }
  return u;
}

function logout() {
  localStorage.removeItem('av_auth');
  window.location.href = 'index.html';
}

function renderNavbar(active) {
  const user = checkAuth();
  if (!user) return;
  const links = [
    { id: 'ajout', href: 'ajout.html', icon: '➕', label: 'Ajout Produit' },
    { id: 'liste', href: 'liste.html', icon: '📋', label: ' Listes des produits' },
    { id: 'bilan', href: 'bilan.html', icon: '📊', label: 'Bilan & Graphique' },
  ];
  document.getElementById('navbar').innerHTML = `
    <div class="nav-inner">
      <div class="nav-logo">
        <div class="nav-logo-icon">📦</div>
        <div class="nav-logo-text">
          <div class="t1">Gestion de produit</div>
          <div class="t2"></div>
        </div>
      </div>
      <nav class="nav-links">
        ${links.map(l => `<a href="${l.href}" class="nav-link ${active===l.id?'active':''}">${l.icon} ${l.label}</a>`).join('')}
      </nav>
      <div class="nav-right">
        <div class="nav-avatar">${(user.login||'A')[0].toUpperCase()}</div>
        <span class="nav-uname">${user.nom || user.login}</span>
        <button class="btn-logout" onclick="logout()">Déconnexion</button>
      </div>
    </div>`;
}
