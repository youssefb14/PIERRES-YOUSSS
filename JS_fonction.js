function Soumettre() 
{  
    var nom = document.getElementById("nom").value;
    var prix = document.getElementById("prix").value;
    var categorie = document.getElementById("categorie").value;
    var nom_image = document.getElementById("image").value;

    if (nom== "" || prix== "" || categorie== "" || nom_image== "")
    {
        alert('remplissez tout les champs ');
        return false;
    }
    else
    {
        return true;
    }
}