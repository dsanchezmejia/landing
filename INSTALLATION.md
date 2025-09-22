# Guía de Instalación - Timeio Landing Package

Esta guía te ayudará a instalar el paquete Timeio Landing directamente desde GitHub sin necesidad de Packagist.

## Opciones de Instalación

### Opción 1: Configurar repositorio en tu composer.json

Agrega el siguiente repositorio a tu `composer.json` del proyecto Laravel:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/timeio/landing"
        }
    ],
    "require": {
        "timeio/landing": "dev-main"
    }
}
```

Luego ejecuta:

```bash
composer update
```

### Opción 2: Configurar repositorio globalmente

```bash
composer config repositories.timeio-landing vcs https://github.com/timeio/landing
composer require timeio/landing:dev-main
```

### Opción 3: Instalación directa con prefer-source

```bash
composer require timeio/landing:dev-main --prefer-source
```

### Opción 4: Usando composer require con URL completa

```bash
composer require "timeio/landing:dev-main" --repository='{"type":"vcs","url":"https://github.com/timeio/landing"}'
```

## Verificación de Instalación

Después de la instalación, verifica que el paquete se haya instalado correctamente:

```bash
composer show timeio/landing
```

## Configuración Post-Instalación

### 1. Publicar configuración (opcional)

```bash
php artisan vendor:publish --provider="Timeio\Landing\LandingServiceProvider" --tag="landing-config"
```

### 2. Configurar variables de entorno

Agrega a tu archivo `.env`:

```env
LANDING_LOGIN_URL=/login
```

### 3. Compilar assets (opcional)

Si quieres personalizar los estilos:

```bash
cd vendor/timeio/landing
npm install
npm run build
```

### 4. Acceder a la landing page

Ve a: `http://tu-dominio.com/landing`

## Actualización del Paquete

Para actualizar el paquete a la última versión:

```bash
composer update timeio/landing
```

## Solución de Problemas

### Error: Repository not found

Si obtienes un error de repositorio no encontrado, asegúrate de que:

1. El repositorio existe en GitHub
2. Tienes acceso al repositorio (si es privado)
3. La URL del repositorio es correcta

### Error: No matching package found

Si Composer no encuentra el paquete:

1. Verifica que hayas agregado el repositorio correctamente
2. Usa `dev-main` como versión
3. Ejecuta `composer clear-cache` y vuelve a intentar

### El ServiceProvider no se registra automáticamente

Si el paquete no se registra automáticamente:

1. Verifica que tu Laravel sea versión 11+
2. Ejecuta `composer dump-autoload`
3. Agrega manualmente el provider en `config/app.php` si es necesario:

```php
'providers' => [
    // ...
    Timeio\Landing\LandingServiceProvider::class,
],
```

## Soporte

Para soporte y preguntas, abre un issue en el [repositorio de GitHub](https://github.com/timeio/landing/issues).
