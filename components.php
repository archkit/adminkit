<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Components - adminkit</title>
  <link href="css/admin.css" rel="stylesheet">
  <script type="module" src="js/admin.js"></script>
</head>

<body>
  <div class="adminkit-layout">
    <?php part('sidebar'); ?>

    <div class="contents">
      <header class="topbar fixed">
        <h1>Components</h1>
        <?php part('topbar-actions'); ?>
        <nav aria-label="breadcrumb">
          <ol>
            <li><a href="index.php">Dashboard</a></li>
            <li>Components</li>
          </ol>
        </nav>
      </header>

      <main class="adminkit">
        <section>
          <h2>Badge</h2>
          <div class="body">
            <p>Status indicators and notification counts.</p>
            <div>
              <span class="c-badge">Default</span>
              <span class="c-badge primary">Primary</span>
              <span class="c-badge success">Success</span>
              <span class="c-badge warning">Warning</span>
              <span class="c-badge danger">Danger</span>
            </div>
          </div>
        </section>

        <section>
          <h2>Button</h2>
          <div class="body">
            <p>Primary, success, danger, ghost variants. Icon support.</p>
            <section>
              <h3>Variants</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button">Default</button>
                  <button class="c-button primary">Primary</button>
                  <button class="c-button success">Success</button>
                  <button class="c-button danger">Danger</button>
                  <button class="c-button ghost">Ghost</button>
                </div>
              </div>
            </section>
            <section>
              <h3>With icon</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button primary"><i data-lucide="plus"></i> Add</button>
                  <button class="c-button success"><i data-lucide="pencil"></i> Edit</button>
                  <button class="c-button danger"><i data-lucide="trash-2"></i> Delete</button>
                  <button class="c-button ghost"><i data-lucide="settings"></i> Settings</button>
                </div>
              </div>
            </section>
            <section>
              <h3>Small</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button small">Default</button>
                  <button class="c-button small primary">Primary</button>
                  <button class="c-button small success">Success</button>
                  <button class="c-button small danger">Danger</button>
                  <button class="c-button small ghost">Ghost</button>
                </div>
              </div>
            </section>
            <section>
              <h3>Disabled</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button" disabled>Default</button>
                  <button class="c-button primary" disabled>Primary</button>
                  <button class="c-button danger" disabled>Danger</button>
                </div>
              </div>
            </section>
            <section>
              <h3>Alignment</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button primary">Left (default)</button>
                </div>
                <div class="flex center">
                  <button class="c-button primary">Center</button>
                </div>
                <div class="flex end">
                  <button class="c-button ghost">Cancel</button>
                  <button class="c-button primary">Save</button>
                </div>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Table</h2>
          <div class="body">
            <p>Striped rows, hover highlight, action column. Scroll wrapper for responsive.</p>
            <section>
              <h3>Default</h3>
              <div class="body">
                <div class="c-table-scroll">
                <table class="c-table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th class="action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Alice Johnson</td>
                      <td>alice@example.com</td>
                      <td>Admin</td>
                      <td><span class="c-badge success">Active</span></td>
                      <td class="action">
                        <div class="flex end">
                          <button class="c-button small success">Edit</button>
                          <button class="c-button small danger">Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Bob Smith</td>
                      <td>bob@example.com</td>
                      <td>Editor</td>
                      <td><span class="c-badge warning">Pending</span></td>
                      <td class="action">
                        <div class="flex end">
                          <button class="c-button small success">Edit</button>
                          <button class="c-button small danger">Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Carol Davis</td>
                      <td>carol@example.com</td>
                      <td>Viewer</td>
                      <td><span class="c-badge">Inactive</span></td>
                      <td class="action">
                        <div class="flex end">
                          <button class="c-button small success">Edit</button>
                          <button class="c-button small danger">Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>David Lee</td>
                      <td>david@example.com</td>
                      <td>Editor</td>
                      <td><span class="c-badge success">Active</span></td>
                      <td class="action">
                        <div class="flex end">
                          <button class="c-button small success">Edit</button>
                          <button class="c-button small danger">Delete</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </section>
            <section>
              <h3>With colgroup</h3>
              <div class="body">
                <div class="c-table-scroll">
                <table class="c-table">
                  <colgroup>
                    <col style="width: 30%">
                    <col style="width: 40%">
                    <col style="width: 30%">
                  </colgroup>
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Description</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Widget A</td>
                      <td>A standard widget for general use</td>
                      <td>$19.99</td>
                    </tr>
                    <tr>
                      <td>Widget B</td>
                      <td>An advanced widget with extra features</td>
                      <td>$29.99</td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </section>
            <section>
              <h3>Scroll wrapper</h3>
              <div class="body">
                <div class="c-table-scroll">
                  <table class="c-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Alice Johnson</td>
                        <td>alice@example.com</td>
                        <td>+1-234-567-8901</td>
                        <td>123 Main Street</td>
                        <td>New York</td>
                        <td>United States</td>
                        <td><span class="c-badge success">Active</span></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Bob Smith</td>
                        <td>bob@example.com</td>
                        <td>+44-20-7946-0958</td>
                        <td>456 High Road</td>
                        <td>London</td>
                        <td>United Kingdom</td>
                        <td><span class="c-badge warning">Pending</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Fields</h2>
          <div class="body">
            <p>Form fields with label, help text, and error state.</p>
            <section class="container narrow center">
              <h3>Text inputs</h3>
              <div class="body">
                <div class="c-fields">
                  <label>
                    <span>Name</span>
                    <input type="text" placeholder="John Doe" required>
                  </label>
                  <label>
                    <span>Email</span>
                    <input type="email" placeholder="john@example.com" required>
                    <small>We'll never share your email.</small>
                  </label>
                  <label>
                    <span>Password</span>
                    <input type="password">
                  </label>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Select &amp; Textarea</h3>
              <div class="body">
                <div class="c-fields">
                  <label>
                    <span>Role</span>
                    <select>
                      <option>Admin</option>
                      <option>Editor</option>
                      <option>Viewer</option>
                    </select>
                  </label>
                  <label>
                    <span>Bio</span>
                    <textarea placeholder="Tell us about yourself..."></textarea>
                  </label>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Checkbox &amp; Radio</h3>
              <div class="body">
                <div class="c-fields">
                  <fieldset>
                    <legend>Notifications</legend>
                    <ul>
                      <li>
                        <label class="check">
                          <input type="checkbox" checked>
                          <span>Email notifications</span>
                          <small>Important updates will always be sent.</small>
                        </label>
                      </li>
                      <li>
                        <label class="check">
                          <input type="checkbox">
                          <span>SMS notifications</span>
                        </label>
                      </li>
                    </ul>
                  </fieldset>
                  <fieldset>
                    <legend>Role</legend>
                    <ul>
                      <li><label class="check"><input type="radio" name="role" checked><span>Admin</span></label></li>
                      <li><label class="check"><input type="radio" name="role"><span>Editor</span></label></li>
                      <li><label class="check"><input type="radio" name="role"><span>Viewer</span></label></li>
                    </ul>
                  </fieldset>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Toggle switch</h3>
              <div class="body">
                <div class="c-fields">
                  <fieldset>
                    <legend>Settings</legend>
                    <ul>
                      <li>
                        <label class="toggle">
                          <input type="checkbox" checked>
                          <span>Dark mode</span>
                        </label>
                      </li>
                      <li>
                        <label class="toggle">
                          <input type="checkbox">
                          <span>Email notifications</span>
                          <small>Receive important updates via email.</small>
                        </label>
                      </li>
                      <li>
                        <label class="toggle">
                          <input type="checkbox" disabled>
                          <span>Maintenance mode</span>
                          <small>Only admins can toggle this.</small>
                        </label>
                      </li>
                    </ul>
                  </fieldset>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Error state</h3>
              <div class="body">
                <div class="c-fields">
                  <label>
                    <span>Email</span>
                    <input type="email" class="error" value="invalid-email">
                    <small class="error">Invalid email address.</small>
                  </label>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Disabled</h3>
              <div class="body">
                <div class="c-fields">
                  <label>
                    <span>Name</span>
                    <input type="text" disabled value="John Doe">
                  </label>
                  <label>
                    <span>Role</span>
                    <select disabled>
                      <option>Admin</option>
                    </select>
                  </label>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Horizontal</h3>
              <div class="body">
                <div class="c-fields horizontal">
                  <label>
                    <span>Name</span>
                    <input type="text" placeholder="John Doe">
                  </label>
                  <label>
                    <span>Email</span>
                    <input type="email" placeholder="john@example.com">
                    <small>We'll never share your email.</small>
                  </label>
                  <label>
                    <span>Bio</span>
                    <textarea placeholder="Tell us about yourself..."></textarea>
                  </label>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>Horizontal checkbox / radio</h3>
              <div class="body">
                <div class="c-fields">
                  <fieldset>
                    <legend>Role</legend>
                    <ul class="horizontal">
                      <li><label class="check"><input type="radio" name="role-h" checked><span>Admin</span></label></li>
                      <li><label class="check"><input type="radio" name="role-h"><span>Editor</span></label></li>
                      <li><label class="check"><input type="radio" name="role-h"><span>Viewer</span></label></li>
                    </ul>
                  </fieldset>
                </div>
              </div>
            </section>
            <section class="container narrow center">
              <h3>With button</h3>
              <div class="body">
                <form class="c-fields">
                  <label>
                    <span>Name</span>
                    <input type="text">
                  </label>
                  <label>
                    <span>Email</span>
                    <input type="email">
                  </label>
                  <div class="flex end">
                    <button type="button" class="c-button ghost">Cancel</button>
                    <button type="submit" class="c-button primary">Save</button>
                  </div>
                </form>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Alert</h2>
          <div class="body">
            <p>Feedback messages with semantic color variants.</p>
            <section>
              <h3>Variants</h3>
              <div class="body">
                <p class="c-alert">This is a default info alert.</p>
                <p class="c-alert success">Changes saved successfully.</p>
                <p class="c-alert warning">Your session will expire in 5 minutes.</p>
                <p class="c-alert danger">Failed to delete the record. Please try again.</p>
              </div>
            </section>
            <section>
              <h3>With title</h3>
              <div class="body">
                <p class="c-alert warning">
                  <strong>Warning</strong>
                  This action cannot be undone. All associated data will be permanently deleted.
                </p>
                <p class="c-alert danger">
                  <strong>Error</strong>
                  The server returned an unexpected response. Please contact support if this persists.
                </p>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Modal</h2>
          <div class="body">
            <p>Dialog overlay for confirmations and forms. Uses native <code>&lt;dialog&gt;</code> element.</p>
            <section>
              <h3>Confirmation</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button primary" data-js-open="confirm">Open confirmation</button>
                </div>
                <dialog data-js-dialog="confirm" class="c-modal">
                  <section>
                    <header>
                      <h3>Confirm Delete</h3>
                      <button class="c-button ghost" data-js-close aria-label="Close"><i data-lucide="x"></i></button>
                    </header>
                    <div class="body">
                      <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                    </div>
                    <footer>
                      <button class="c-button ghost" data-js-close>Cancel</button>
                      <button class="c-button danger" data-js-close>Delete</button>
                    </footer>
                  </section>
                </dialog>
              </div>
            </section>
            <section>
              <h3>With form</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button primary" data-js-open="form">Open form</button>
                </div>
                <dialog data-js-dialog="form" class="c-modal">
                  <section>
                    <header>
                      <h3>Edit Profile</h3>
                      <button class="c-button ghost" data-js-close aria-label="Close"><i data-lucide="x"></i></button>
                    </header>
                    <div class="body">
                      <div class="c-fields">
                        <label>
                          <span>Name</span>
                          <input type="text" value="Alice Johnson">
                        </label>
                        <label>
                          <span>Email</span>
                          <input type="email" value="alice@example.com">
                        </label>
                      </div>
                    </div>
                    <footer>
                      <button class="c-button ghost" data-js-close>Cancel</button>
                      <button class="c-button primary" data-js-close>Save</button>
                    </footer>
                  </section>
                </dialog>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Tabs</h2>
          <div class="body">
            <p>Tabbed navigation for switching content panels. Uses <code>role="tab"</code> / <code>role="tabpanel"</code> with JS切り替え.</p>
            <section>
              <h3>Default</h3>
              <div class="body">
                <div class="c-tabs">
                  <div role="tablist">
                    <button role="tab" aria-selected="true" data-js-tab="overview">Overview</button>
                    <button role="tab" data-js-tab="details">Details</button>
                    <button role="tab" data-js-tab="settings">Settings</button>
                  </div>
                  <div role="tabpanel" data-js-panel="overview">
                    <p>Overview content goes here. This is the first tab panel.</p>
                  </div>
                  <div role="tabpanel" data-js-panel="details" hidden>
                    <p>Details content goes here. This is the second tab panel.</p>
                  </div>
                  <div role="tabpanel" data-js-panel="settings" hidden>
                    <p>Settings content goes here. This is the third tab panel.</p>
                  </div>
                </div>
              </div>
            </section>
            <section>
              <h3>With card</h3>
              <div class="body">
                <div class="c-card">
                  <div class="c-tabs">
                    <div role="tablist">
                      <button role="tab" aria-selected="true" data-js-tab="general">General</button>
                      <button role="tab" data-js-tab="security">Security</button>
                    </div>
                    <div role="tabpanel" data-js-panel="general">
                      <p>General settings panel inside a card.</p>
                    </div>
                    <div role="tabpanel" data-js-panel="security" hidden>
                      <p>Security settings panel inside a card.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Pagination</h2>
          <div class="body">
            <p>Page navigation for lists and tables. CSS のみ。ページ切り替えは PHP 側の責務。</p>
            <section>
              <h3>Default</h3>
              <div class="body">
                <nav class="c-pagination" aria-label="Pagination">
                  <a href="#" aria-label="Previous"><i data-lucide="chevron-left"></i></a>
                  <a href="#">1</a>
                  <a href="#" aria-current="page">2</a>
                  <a href="#">3</a>
                  <span>…</span>
                  <a href="#">10</a>
                  <a href="#" aria-label="Next"><i data-lucide="chevron-right"></i></a>
                </nav>
              </div>
            </section>
            <section>
              <h3>First page</h3>
              <div class="body">
                <nav class="c-pagination" aria-label="Pagination">
                  <a href="#" aria-label="Previous" aria-disabled="true"><i data-lucide="chevron-left"></i></a>
                  <a href="#" aria-current="page">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <span>…</span>
                  <a href="#">10</a>
                  <a href="#" aria-label="Next"><i data-lucide="chevron-right"></i></a>
                </nav>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Avatar</h2>
          <div class="body">
            <p>User images with size variants and fallback initials.</p>
            <section>
              <h3>Image</h3>
              <div class="body">
                <div class="flex">
                  <img class="c-avatar small" src="https://i.pravatar.cc/48?u=1" alt="Alice">
                  <img class="c-avatar" src="https://i.pravatar.cc/64?u=2" alt="Bob">
                  <img class="c-avatar large" src="https://i.pravatar.cc/96?u=3" alt="Charlie">
                </div>
              </div>
            </section>
            <section>
              <h3>Initials</h3>
              <div class="body">
                <div class="flex">
                  <span class="c-avatar small">AJ</span>
                  <span class="c-avatar">BK</span>
                  <span class="c-avatar large">CL</span>
                </div>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Tooltip</h2>
          <div class="body">
            <p>Contextual text popups on hover or focus. <code>data-tooltip</code> 属性で指定。CSS のみ。</p>
            <section>
              <h3>Default</h3>
              <div class="body">
                <div class="flex">
                  <button class="c-button" data-tooltip="Edit this item"><i data-lucide="pencil"></i> Edit</button>
                  <button class="c-button danger" data-tooltip="Delete permanently"><i data-lucide="trash-2"></i> Delete</button>
                  <button class="c-button ghost" data-tooltip="More options"><i data-lucide="more-horizontal"></i></button>
                </div>
              </div>
            </section>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
