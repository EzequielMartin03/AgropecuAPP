<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Trabajos</title>
  <style>
    /*
    ! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com
    */

    /*
    1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
    2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
    */

    *,
    ::before,
    ::after {
      box-sizing: border-box;
      /* 1 */
      border-width: 0;
      /* 2 */
      border-style: solid;
      /* 2 */
      border-color: #e5e7eb;
      /* 2 */
    }

    ::before,
    ::after {
      --tw-content: '';
    }

    /*
    1. Use a consistent sensible line-height in all browsers.
    2. Prevent adjustments of font size after orientation changes in iOS.
    3. Use a more readable tab size.
    4. Use the user's configured `sans` font-family by default.
    5. Use the user's configured `sans` font-feature-settings by default.
    6. Use the user's configured `sans` font-variation-settings by default.
    */

    html {
      line-height: 1.5;
      /* 1 */
      -webkit-text-size-adjust: 100%;
      /* 2 */
      -moz-tab-size: 4;
      /* 3 */
      tab-size: 4;
      /* 3 */
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      /* 4 */
      font-feature-settings: normal;
      /* 5 */
      font-variation-settings: normal;
      /* 6 */
    }

    /*
    1. Remove the margin in all browsers.
    2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
    */

    body {
      margin: 0;
      /* 1 */
      line-height: inherit;
      /* 2 */
    }

    /*
    1. Add the correct height in Firefox.
    2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
    3. Ensure horizontal rules are visible by default.
    */

    hr {
      height: 0;
      /* 1 */
      color: inherit;
      /* 2 */
      border-top-width: 1px;
      /* 3 */
    }

    /*
    Add the correct text decoration in Chrome, Edge, and Safari.
    */

    abbr:where([title]) {
      -webkit-text-decoration: underline dotted;
              text-decoration: underline dotted;
    }

    /*
    Remove the default font size and weight for headings.
    */

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: inherit;
      font-weight: inherit;
    }

    /*
    Reset links to optimize for opt-in styling instead of opt-out.
    */

    a {
      color: inherit;
      text-decoration: inherit;
    }

    /*
    Add the correct font weight in Edge and Safari.
    */

    b,
    strong {
      font-weight: bolder;
    }

    /*
    1. Use the user's configured `mono` font family by default.
    2. Correct the odd `em` font sizing in all browsers.
    */

    code,
    kbd,
    samp,
    pre {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      /* 1 */
      font-size: 1em;
      /* 2 */
    }

    /*
    Add the correct font size in all browsers.
    */

    small {
      font-size: 80%;
    }

    /*
    Prevent `sub` and `sup` elements from affecting the line height in all browsers.
    */

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline;
    }

    sub {
      bottom: -0.25em;
    }

    sup {
      top: -0.5em;
    }

    /*
    1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
    2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
    3. Remove gaps between table borders by default.
    */

    table {
      text-indent: 0;
      /* 1 */
      border-color: inherit;
      /* 2 */
      border-collapse: collapse;
      /* 3 */
    }

    /*
    1. Change the font styles in all browsers.
    2. Remove the margin in Firefox and Safari.
    3. Remove default padding in all browsers.
    */

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      /* 1 */
      font-feature-settings: inherit;
      /* 1 */
      font-variation-settings: inherit;
      /* 1 */
      font-size: 100%;
      /* 1 */
      font-weight: inherit;
      /* 1 */
      line-height: inherit;
      /* 1 */
      color: inherit;
      /* 1 */
      margin: 0;
      /* 2 */
      padding: 0;
      /* 3 */
    }

    /*
    Remove the inheritance of text transform in Edge and Firefox.
    */

    button,
    select {
      text-transform: none;
    }

    /*
    1. Correct the inability to style clickable types in iOS and Safari.
    2. Remove default button styles.
    */

    button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
      -webkit-appearance: button;
      /* 1 */
      background-color: transparent;
      /* 2 */
      background-image: none;
      /* 2 */
    }

    /*
    Use the modern Firefox focus style for all focusable elements.
    */

    :-moz-focusring {
      outline: auto;
    }

    /*
    Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
    */

    :-moz-ui-invalid {
      box-shadow: none;
    }

    /*
    Add the correct vertical alignment in Chrome and Firefox.
    */

    progress {
      vertical-align: baseline;
    }

    /*
    Correct the cursor style of increment and decrement buttons in Safari.
    */

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
      height: auto;
    }

    /*
    1. Correct the odd appearance in Chrome and Safari.
    2. Correct the outline style in Safari.
    */

    [type='search'] {
      -webkit-appearance: textfield;
      /* 1 */
      outline-offset: -2px;
      /* 2 */
    }

    /*
    Remove the inner padding in Chrome and Safari on macOS.
    */

    ::-webkit-search-decoration {
      -webkit-appearance: none;
    }

    /*
    1. Correct the inability to style clickable types in iOS and Safari.
    2. Change font properties to `inherit` in Safari.
    */

    ::-webkit-file-upload-button {
      -webkit-appearance: button;
      /* 1 */
      font: inherit;
      /* 2 */
    }

    /*
    Add the correct display in Chrome and Safari.
    */

    summary {
      display: list-item;
    }

    /*
    Removes the default spacing and border for appropriate elements.
    */

    blockquote,
    dl,
    dd,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    figure,
    p,
    pre {
      margin: 0;
    }

    fieldset {
      margin: 0;
      padding: 0;
    }

    legend {
      padding: 0;
    }

    ol,
    ul,
    menu {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    /*
    Reset default styling for dialogs.
    */

    dialog {
      padding: 0;
    }

    /*
    Prevent resizing textareas horizontally by default.
    */

    textarea {
      resize: vertical;
    }

    /*
    1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
    2. Set the default placeholder color to the color set by Tailwind CSS.
    */

    ::placeholder {
      color: #9ca3af;
      /* 2 */
      opacity: 1;
      /* 1 */
    }

    /*
    Correct the appearance of disabled inputs.
    */

    [disabled] {
      cursor: not-allowed;
    }

    /*
    Make the scrollbar more visible for most web browsers.
    */

    ::-webkit-scrollbar {
      width: 12px;
      height: 12px;
    }

    ::-webkit-scrollbar-track {
      background: #f3f4f6;
    }

    ::-webkit-scrollbar-thumb {
      background: #d1d5db;
      border-radius: 0.375rem;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #6b7280;
    }

    /*
    Add a few default styles for key components.
    */

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      color: #111827;
      font-weight: 700;
    }

    p {
      margin-bottom: 1.25rem;
      line-height: 1.75rem;
      color: #6b7280;
    }

    a {
      color: #3b82f6;
    }

    a:hover {
      color: #2563eb;
    }

    .text-main {
      color: #3b82f6;
    }

    .bg-slate-100 {
      background-color: #f3f4f6;
    }

    .text-slate-400 {
      color: #9ca3af;
    }

    .text-neutral-600 {
      color: #4b5563;
    }

    .font-bold {
      font-weight: 700;
    }

    .whitespace-nowrap {
      white-space: nowrap;
    }

    .border-collapse {
      border-collapse: collapse;
    }

    .border-spacing-0 {
      border-spacing: 0;
    }

    .border-b {
      border-bottom-width: 1px;
    }

    .w-full {
      width: 100%;
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .px-14 {
      padding-left: 3.5rem;
      padding-right: 3.5rem;
    }

    .py-6 {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .h-12 {
      height: 3rem;
    }

    .text-sm {
      font-size: 0.875rem;
    }

    .font-bold {
      font-weight: 700;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .text-neutral-700 {
      color: #374151;
    }

    .border-r {
      border-right-width: 1px;
    }

    .pl-4 {
      padding-left: 1rem;
    }

    .pr-4 {
      padding-right: 1rem;
    }

    .py-2 {
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    }
  </style>
</head>

<body>
  <div>
    <div class="py-4">
      <div class="px-14 py-6">
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-full align-top">
                <div>
                  <?php
                  $path = 'assets/img/logo_pulveriagro.png';
                  $type = pathinfo($path, PATHINFO_EXTENSION);
                  $data = file_get_contents($path);
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                  ?>
                  <img src="<?php echo $base64?>" style="height: 4rem;" />
                </div>
              </td>

              <td class="align-top">
                <div class="text-sm">
                  <table class="border-collapse border-spacing-0">
                    <tbody>
                      <tr>
                        <td class="border-r pr-4">
                          <div>
                            <p class="whitespace-nowrap text-slate-400 text-right">Fecha</p>
                            <p class="whitespace-nowrap font-bold text-main text-right"><?= date('d/m/y') ?></p>
                          </div>
                        </td>
                        <td class="pl-4">
                          <div>
                            <!-- Información del cliente aquí -->
                            <p class="whitespace-nowrap text-slate-400 text-right">Cliente</p>
                            <p class="whitespace-nowrap font-bold text-main text-right"><?= htmlspecialchars($_SESSION['NombreCliente'])  ?></p>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="bg-slate-100 px-14 py-6 text-sm">
        <table class="w-full border-collapse border-spacing-0 table-center">
          <thead>
            <tr>
            <th class="border-b py-5 px-10 text-left text-neutral-700">Descripción</th>
            <th class="border-b py-5 px-10 text-left text-neutral-700">Cantidad Hectáreas</th>
            <th class="border-b py-5 px-10 text-left text-neutral-700">Fecha Trabajo</th>
            

            </tr>
          </thead>
          <tbody>
            <?php if (isset($resultados) && !empty($resultados)): ?>
              <?php
                $total_hectareas = 0;
                foreach ($resultados as $resultado) {
                  $total_hectareas += $resultado->CantidadHectareasTrabajadas;
                  ?>
                <tr>
                  <td class="border-b py-3 text-center"><?= htmlspecialchars($resultado->Descripcion) ?></td>
                  <td class="border-b py-3 text-center"><?= htmlspecialchars($resultado->CantidadHectareasTrabajadas) ?></td>
                  <td class="border-b py-3 text-center"><?= htmlspecialchars($resultado->FechaTrabajo) ?></td>
                  
                </tr>
              <?php } ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="border-b py-2 text-center text-neutral-600">No hay resultados disponibles.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        
        </table>
      </div>
    </div>
    <!-- Total Hectáreas Trabajadas -->
    <div class="w-full mt-4 border border-gray-300 bg-gray-100">
      <div class="p-4 font-bold text-right">Total Hectáreas Trabajadas:</div>
      <div class="p-4 font-bold text-right"><?php echo number_format($total_hectareas, 2); ?></div>
    </div>
  </div>
</body>

</html>