// created unified file for localStorage manipulation

export const localStorageSetter = (key, value) => {
  key = JSON.stringify(key);
  value = JSON.stringify(value);
  localStorage.setItem(key, value);
};

export const localStorageGetter = key => {
  return JSON.parse(localStorage.getItem(key));
};
