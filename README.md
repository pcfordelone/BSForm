# BSForm
Formulário criado programaticamente com PHP e estilizado com *Twitter Bootstrap*

## Instruções

### Instalação
```
git clone https://github.com/brunowerneck/BSForm.git
cd BSForm
composer install
```

### Execução
Para executar o sistema, você pode utilizar tanto o **servidor embutido do PHP 5.4+** quanto o **virtual host do Apache 2.4**.

### Servidor embutido do PHP 5.4+

```
cd BSForm
php -S 0.0.0.0:8001 -t public_html/
```

### Virtualhost do Apache 2.4
```
<Virtualhost *:80>
  DocumentRoot "/caminho/do/seu/public_html"
  Servername nome.do.servidor
  <Directory "/caminho/do/seu/public_html/">
    AllowOverride All
    Options All
    Require all granted
  </Directory>
</Virtualhost>

E abra no seu navegador:
http://nome.do.servidor/demo.php
```