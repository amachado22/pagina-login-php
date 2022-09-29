
document.addEventListener('click', (e) => {
    if (e.target.matches("#getoutlogin")) {
        getoutlogin();
    }
    if (e.target.matches("#getoutindex")) {
      geterror(true);
    }
    if (e.target.matches("#getinlogin")) {
      getinlogin();
    }
    if (e.target.matches("#getoutindexregister")) {
      geterror(false);
    }
})

const getoutlogin = () => {
  window.location.href = "../index.php?message=logout";
};

const getinlogin = () => {
  window.location.href = "../index.php";
}

const geterror = (error) => {
    if (error) {
      alert("Senha incorreta ou nome de usuário");
      window.location.href = "../index.php";
    } 
    if(!error){
      alert("Não foi possível registrar");
      window.location.href = "../index.php";
    }
};